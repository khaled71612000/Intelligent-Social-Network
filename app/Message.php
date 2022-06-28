<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Chat;

class Message extends Model
{
    //
    const UPDATED_AT = null;
    protected $fillable = ['user_id', 'message', 'media', 'url', 'chat_id'];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function chat() {
        return $this->belongsTo(Chat::class, "chat_id");
    }
}
