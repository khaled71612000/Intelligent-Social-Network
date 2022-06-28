<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Message;

class Chat extends Model
{
    //
    protected $table = "chats";

    public function users() {
        return $this->belongsToMany(User::class, "user_chat", "chat_id", "id");
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }
}
