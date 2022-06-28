<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Message;
use App\User;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $user;
    public $message;

    public function __construct(User $user, Message $message)
    {
        $this->dontBroadcastToCurrentUser();
        $this->user = $user;
        $this->message = $message;
    }
    


//     /**
//      * Get the channels the event should broadcast on.
//      *
//      * @return \Illuminate\Broadcasting\Channel|array
//      */
    public function broadcastOn()
    {
        return new PrivateChannel('chat-' . $this->message->chat_id);
    }
//     public function broadcastWith()
// {
//     return
//     [
//         'user'=>$this->user,
//         'message'=> $this->message
//     ];
// }
    public function broadcastAs()
    {
        return 'MessageSent';
    }
}
