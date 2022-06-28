<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InitChat implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $initiator_id;
    public $target_id;
    public $chat_id;

    public function __construct($initiator_id, $target_id, $chat_id) {
        $this->initiator_id = $initiator_id;
        $this->target_id = $target_id;
        $this->chat_id = $chat_id;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('notification-' . $this->target_id);
    }
    public function broadcastAs() {
        return 'InitChat';
    }
}
