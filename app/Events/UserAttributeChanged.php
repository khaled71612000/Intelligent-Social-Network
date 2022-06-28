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

use App\User;

class UserAttributeChanged implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $user;
    public $attribute_name;
    public $attribute_old_value;
    public $attribute_new_value;

    public function __construct(User $user, $attr_name, $attr_old_val, $attr_new_val) {
        $this->user = $user;
        $this->attribute_name = $attr_name;
        $this->attribute_old_value = $attr_old_val;
        $this->attribute_new_value = $attr_new_val;
        $this->user->notify(new \App\Notifications\UserAttributeChanged($this));
    }


    public function getDataForUser() {
        return [
            'attribute_name' => $this->attribute_name,
            'attribute_old_value' => ucfirst($this->attribute_old_value),
            'attribute_new_value' => ucfirst($this->attribute_new_value)
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
        return new PrivateChannel('notification-' . $this->user->id);
    }

    public function broadcastAs() {
        return "UserAttributeChanged";
    }
}
