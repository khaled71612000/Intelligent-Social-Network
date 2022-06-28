<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\User;

class EmotificationGranted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $user;
    public $friend;
    public function __construct(User $user, User $friend)
    {
        $this->user = $user;
        $this->friend = $friend->minimizeAttributes();

        $friend->notify(new \App\Notifications\EmotificationGranted($this));
    }


    public function getDataForUser() {
        return [
            'friend' => $this->user->minimizeAttributes()
        ];
    }

    public function broadcastWith() {
        return $this->getDataForUser();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    
    public function broadcastOn()
    {
        $friend_id = $this->friend['id'];
        return new PrivateChannel('notification-'.$friend_id);
    }

    public function broadcastAs() {
        return "EmotificationGranted";
    }
}
