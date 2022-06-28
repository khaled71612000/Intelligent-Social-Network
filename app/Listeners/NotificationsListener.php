<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotificationsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handleCommentCreated($event) {
        
    }

    public function handleFriendAccepted($event) {
        
    }

    public function handleFriendRequestSent($event) {
        
    }

    public function handlePostLiked($event) {
        
    }

    public function handleNewUser($event) {
        
    }

    public function handleEmotification($event) {
        
    }

    public function handleFriendEmotification($event) {
        
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function subscribe($events) {
        $events->listen(
            'App\Events\CommentCreated',
            [NotificationsListener::class, 'handleCommentCreated']
        );

        $events->listen(
            'App\Events\FriendRequestAccepted',
            [NotificationsListener::class, 'handleFriendAccepted']
        );

        $events->listen(
            'App\Events\FriendRequestSent',
            [NotificationsListener::class, 'handleFriendRequestSent']
        );

        $events->listen(
            'App\Events\PostLiked',
            [NotificationsListener::class, 'handlePostLiked']
        );

        $events->listen(
            'App\Events\NewUser',
            [NotificationsListener::class, 'handleNewUser']
        );

        $events->listen(
            'App\Events\Emotification',
            [NotificationsListener::class, 'handleEmotification']
        );

        $events->listen(
            'App\Events\FriendEmotification',
            [NotificationsListener::class, 'handleFriendEmotification']
        );
    }
}
