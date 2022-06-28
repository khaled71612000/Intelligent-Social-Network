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

class FriendEmotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $user;
    public $emotion;

    public function __construct($user, $emotion)
    {
        $this->emotion = $emotion;
        $this->user = $user;
        
        // Notification party
        $emotifiable_users = User::select('id')->whereIn('id', $user->emotifiables)->get();
        \Notification::send($emotifiable_users, new \App\Notifications\FriendEmotification($this));
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */

    public function getDataForUser() {
        return [
            'user' => $this->user->makeVisible("emotions")->only(['id', 'name', 'personality', "emotions", 'avatar_full_path']), // don't use $user->minimizeAttributes()
            'emotifiable_message' => "Your friend '{$this->user->name}' may not be ok at this time!"
        ];
    }



    public function broadcastWith() {
        return $this->getDataForUser();
    }

    public function broadcastWhen() {
        return $this->user->emotifiables->count() > 0;
    }

    public function broadcastOn()
    {
        $emotifiables_channels = array();

        foreach ($this->user->emotifiables as $emotifiable_id) {
           array_push($emotifiables_channels, new PrivateChannel('notification-' . $emotifiable_id));
        }
        return $emotifiables_channels;
    }

    public function broadcastAs() {
        return 'FriendEmotification';
    }
}
