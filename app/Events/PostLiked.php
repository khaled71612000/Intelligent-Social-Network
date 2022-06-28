<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\{User, Post};

class PostLiked implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $user;
    public $post;
    public $post_user_id;
    public function __construct(User $user, Post $post)
    {
        $this->post_user_id = $post->user->id;
        $this->user = $user->minimizeAttributes();
        $this->post = $post->only(['id', 'header', 'community']);

        if($user->id != $post['user']->id)
            $post['user']->notify(new \App\Notifications\PostLiked($this));
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */

    public function getDataForUser() {
        return [
            'user' => $this->user,
            'post' => $this->post,
        ];
    }

    public function broadcastWith() {
        return $this->getDataForUser();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('notification-' . $this->post_user_id);
    }

    public function broadcastAs()
    {
        return 'PostLiked';
    }
}
