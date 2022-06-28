<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Emotion, VAK, Personality};
use App\{Message, Comment, Post};
use Illuminate\Support\Facades\Http;

class ScheduleController extends Controller
{

    protected $AI_base_URL;
    public function __construct()
    {
        $this->AI_base_URL = env("AI_BASE_URL", "https://aionism.herokuapp.com");
    }

    public function analyzeBatches() {
        $all_users_messages = \DB::select("select user_id, GROUP_CONCAT(DISTINCT message SEPARATOR ' ') as text FROM messages WHERE `created_at` >= CURDATE()AND `created_at` < CURDATE() + INTERVAL 1 DAY GROUP BY user_id");
        $all_users_comments =  \DB::select("select user_id, GROUP_CONCAT(DISTINCT body SEPARATOR ' ') as text FROM comments WHERE `created_at` >= CURDATE()AND `created_at` < CURDATE() + INTERVAL 1 DAY GROUP BY user_id");
        $all_users_posts = \DB::select("select user_id, GROUP_CONCAT(DISTINCT concat(`header`, ' ', `body`) SEPARATOR ' ') as text FROM posts WHERE `created_at` >= CURDATE()AND `created_at` < CURDATE() + INTERVAL 1 DAY GROUP BY user_id");
        

        $messages_emotions = Http::post($this->AI_base_URL."/emotion/batch",
            ['data' => $all_users_messages]
        );
        $messages_personality = Http::post($this->AI_base_URL."/personality/batch",
        ['data' => $all_users_messages]
        );
        $messages_learning = Http::post($this->AI_base_URL."/learning/batch",
        ['data' => $all_users_messages]
        );


        $posts_emotions = Http::post($this->AI_base_URL."/emotion/batch",
        ['data' => $all_users_posts]
        );
        $posts_personality = Http::post($this->AI_base_URL."/personality/batch",
        ['data' => $all_users_posts]
        );
        $posts_learning = Http::post($this->AI_base_URL."/learning/batch",
        ['data' => $all_users_posts]
        );

        $comments_emotions = Http::post($this->AI_base_URL."/emotion/batch",
        ['data' => $all_users_comments]
        );
        $comments_personality = Http::post($this->AI_base_URL."/personality/batch",
        ['data' => $all_users_comments]
        );
        $comments_learning = Http::post($this->AI_base_URL."/learning/batch",
        ['data' => $all_users_comments]
        );

        // UPDATE DATABASE
    
    }
}
