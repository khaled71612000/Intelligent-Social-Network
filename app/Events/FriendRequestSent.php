<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use Carbon\Carbon;
use App\User;

class FriendRequestSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $sender;
    public $receiver;
    public function __construct(User $sender, User $receiver)
    {

        $this->sender = $sender->minimizeAttributes();
        $this->receiver = $receiver;

        $this->receiver->notify(new \App\Notifications\FriendRequestSent($this));
    }

    public function getDataForUser() {
        return [
            'user' => $this->sender,
            'created_at' => Carbon::now()
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
        return new PrivateChannel('notification-'.$this->receiver->id);
    }

    public function broadcastAs() {
        return 'FriendRequestSent';
    }
}
