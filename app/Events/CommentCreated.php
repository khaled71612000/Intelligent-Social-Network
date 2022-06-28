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

use App\{User, Post, Comment};

class CommentCreated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    
    public $user;
    public $post;
    private $comment;

    public function __construct(User $user, Post $post, Comment $comment)
    {
        $this->dontBroadcastToCurrentUser();
        $this->comment = $comment;
        $this->user = $user->minimizeAttributes();
        $this->post = $post->only(['id', 'header', 'user', 'community']);

        if($user->id != $post['user']->id)
            $post['user']->notify(new \App\Notifications\CommentCreated($this));
        

    }

    public function getComment() {
        return $this->comment;
    }

    public function getDataForUser() {
        // unset($this->post["user"]);
        return [
            'user' => $this->user,
            'post' => $this->post,
        ];
    }

    public function getDataForPostCurrentReaders() {
        // Instead of SQL Query, just set the values here
        $this->comment['upvotes_count'] = 0;
        $this->comment['downvotes_count'] = 0;
        $this->comment['user'] = $this->user;
        return [
            'comment' => $this->comment
        ];
    }

    public function broadcastWith() {
        return $this->getDataForPostCurrentReaders();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        $post_user_id = $this->post['user']->id;
        $post_id = $this->post['id'];
        unset($this->post['user']);
        

        return [
            new PrivateChannel('notification-' . $post_user_id),
            new Channel('post-' . $post_id),
        ];
    }


    public function broadcastAs()
    {
        return 'CommentCreated';
    }
}
