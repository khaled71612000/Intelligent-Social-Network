<?php

namespace App\Listeners;
use App\Events\{MessageSent, PostCreated, CommentCreated, Emotification, UserAttributeChanged};
use App\{User, Personality, Emotion, VAK};
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class Psychology implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public $AI_base_URL;

    protected $negative_emotions = ['sad', 'angry', 'fear'];
    protected $emotification_threshold = [
        'sad' => 3,
        'angry' => 2,
        'fear' => 3
    ];
    protected $min_words_for_personality_analysis = 20;
    protected $min_words_for_emotion_analysis = 2;
    protected $min_words_for_learning_analysis = 4;

    /* INFO about AI processing
        * Personality type analysis works better with texts near ~300 words.
        * Learning style works better with texts >= 10 words
        * Emotion analysis works on maximum 48 words, else it truncates text
    */

    public function __construct()
    {
        $this->AI_base_URL = env("AI_BASE_URL", "https://aionism.herokuapp.com");
    }

    /**
     * Handle the event.
     *
     * @param  MessageSent  $event
     * @return void
     */
    // public function handle(MessageSent $event)
    // {
    //     // $event->user    $event->message['message']
    //     // SELECT GROUP_CONCAT(message SEPARATOR ' ') as message FROM `messages` GROUP BY user_id

    // }

    public function isNegativeEmotion($emotion) {
        return in_array($emotion, $this->negative_emotions);
    }

    public function weShouldNotifyUserEmotions($user, $emotion, $hits) {
        // TODO: change condition 1, allow notification if already notified with another bad emotion in the same day
        // Should we ?
        // 1- if this is the first emotification today 
        // 2- if the emotion is negative :)
        // 3- if threshold reached (see threshold variable above)
        $userAlreadyEmotifiedToday = $user->notifications->where('type', \App\Notifications\Emotification::class)->where('created_at', '>=',  Carbon::today())->where('data.emotion_name', ucfirst($emotion))->count() > 0;
        $emotionIsNegative = $this->isNegativeEmotion($emotion);
        $emotification_threshold_reached = $emotionIsNegative && $hits >= $this->emotification_threshold[$emotion];
        return !$userAlreadyEmotifiedToday && $emotionIsNegative && $emotification_threshold_reached;
    }

    public function analyzePersonality($text, $user) {
        // API to analyze personality type, return new predicted type if changed, otherwise null
        $old_personality = $user->personality;
        if($this->textContainsEnoughWords($text, $this->min_words_for_personality_analysis)) {
            $user_id = $user->id;
            $response = Http::post($this->AI_base_URL."/personality/",
                ["text" => $text]
            );
            
            // Get result & Update user's personality type
            $personality = Personality::find($user_id);
            $predictedPersonality = $response["data"]["personality_type"];
            $personality[$predictedPersonality] += 1;
            $personality->save();
            
            $personalityIsChanged = $personality[$predictedPersonality] >= $personality[$old_personality] && $predictedPersonality != $old_personality;
            return ($personalityIsChanged ? $predictedPersonality : null);
        }
        return null;
    }

    public function analyzeLearningStyle($text, $user) {
        // API to analyze learning style, return new predicted type if changed, otherwise null
        $old_learning = strtolower($user->learning_style);
        if($this->textContainsEnoughWords($text, $this->min_words_for_learning_analysis)) {
            $user_id = $user->id;
            $response = Http::post($this->AI_base_URL."/learning/",
                ["text" => $text]
            );

            // Get result & Update user's learning style
            $predictedLearning = $response["data"]["learning_style"];
            $learningStyle = VAK::find($user_id);
            $learningStyle[$predictedLearning] += 1;
            $learningStyle->save();
            
            $predictedLearning = strtolower($predictedLearning);
            $learningStyleIsChanged = $learningStyle[$predictedLearning] >= $learningStyle[$old_learning] && $predictedLearning != $old_learning;
            return ($learningStyleIsChanged ? $predictedLearning : null);
        }
        return null;
    }

    public function analyzeEmotions($text, $user) {
        // API to analyze emotion
        $old_emotion = strtolower($user->emotions);
        if($this->textContainsEnoughWords($text, $this->min_words_for_emotion_analysis)) {
            $user_id = $user->id;
            $response = Http::post($this->AI_base_URL."/emotion/",
                ["text" => $text]
            );
            // Get result & Update user's emotion
            $emotion = Emotion::find($user_id);
            $predictedEmotion = $emotion->mapEmotion($response["data"]["emotion"]);
            $confidence = $response["data"]["probability"];
            $emotion[$predictedEmotion] += 1;
            $emotion->save();
            
            $predictedEmotion = strtolower($predictedEmotion);

            $emotionIsChanged = $emotion[$predictedEmotion] >= $emotion[$old_emotion] && $predictedEmotion != $old_emotion;
            

            // Check if the system should notify user of his negative emotions
            $emotional_hits = $emotion["$predictedEmotion"];
            if($this->weShouldNotifyUserEmotions($user, $predictedEmotion, $emotional_hits)) {
                // Trigger Emotifications
                $event = new Emotification($user, $predictedEmotion);
                event($event);
            }
            return ($emotionIsChanged ? $predictedEmotion : null);
        }
        return null;
    }

    public function textContainsEnoughWords($text, $min) {
        $n_words = str_word_count($text);
        return $n_words >= $min;
    }

    // public function isThereAnyChanges($oldAttribute, $newAttribute) {
    //     // Return true if personality, learning_style or emotions have changed to a new value
    //     return $oldAttribute == $newAttribute;
    // }

    public function handlePostCreated($event) {
        // Analyze personality type & learning style
        $header = $event->post->header;
        $body = $event->post->body;
        $text = "$header $body";
        $user = $event->post->user;

        $new_personality = $this->analyzePersonality($text, $user);
        $new_learning_style = $this->analyzeLearningStyle($text, $user);
        // $new_emotion = $this->analyzeEmotions($text, $user);

        // If attribute is changed to new attribute, notify user with new attribute
        if($new_personality)
            event(new UserAttributeChanged($user, 'personality', $user->personality, $new_personality));
        if($new_learning_style)
            event(new UserAttributeChanged($user, 'learning_style', $user->learning_style, $new_learning_style));
    }
    
    public function handleCommentCreated($event) {
        // Analyze Emotion && Learning style

        $comment = $event->getComment();
        $text = $comment->body;
        $user = $comment->user;

        $new_personality = $this->analyzePersonality($text, $user);
        $new_learning_style = $this->analyzeLearningStyle($text, $user);

        if($new_personality)
            event(new UserAttributeChanged($user, 'personality', $user->personality, $new_personality));
        if($new_learning_style)
            event(new UserAttributeChanged($user, 'learning_style', $user->learning_style, $new_learning_style));
    }


    public function handleMessageSent($event) {
        // Analyze Emotions
        $text = $event->message->message;
        $user = $event->message->user;

        $new_emotion = $this->analyzeEmotions($text, $user);
        if($new_emotion)
            event(new UserAttributeChanged($user, 'emotions', $user->emotions, $new_emotion));
    }

    public function subscribe($events) {
        $events->listen(
            'App\Events\MessageSent',
            [Psychology::class, 'handleMessageSent']
        );
        $events->listen(
            'App\Events\PostCreated',
            [Psychology::class, 'handlePostCreated']
        );
        $events->listen(
            'App\Events\CommentCreated',
            [Psychology::class, 'handleCommentCreated']
        );
    }
}
