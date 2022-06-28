<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Events\FriendEmotification;
use App\EmotionalSupport;
class Emotification implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $user;
    public $emotion;
    public $emotional_support_message;
    public function __construct($user, $emotion)
    {
        $this->emotion = $emotion;
        $this->user = $user;
        $this->emotional_support_message = EmotionalSupport::inRandomOrder()->where("emotion", $emotion)->limit(1)->get()[0]->quote;

        
        // Notification user & trigger emotification for his emotifiables
        $user->notify(new \App\Notifications\Emotification($this));
        event(new FriendEmotification($user, $emotion));
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */

    public function getDataForUser() {
        $user_first_name = explode(" ", $this->user->name)[0];
        return [
            "user" => $this->user->only(['id', 'name', 'personality', 'emotions', 'avatar_full_path', 'gender']),
            'emotion_name' => ucfirst($this->emotion),
            'notifiable_message' => "$user_first_name, " . $this->emotional_support_message,
        ];
    }

    public function broadcastWith() {
        return $this->getDataForUser();
    }

    public function broadcastOn() {
    
        $user_id = $this->user->id;
        return new PrivateChannel('notification-' . $user_id);
    }

    public function broadcastAs() {
        return 'Emotification';
    }
}
