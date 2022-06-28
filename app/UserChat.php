<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserChat extends Model
{
    //
    protected $table = "user_chat";
    protected $guarded = [];
    public $timestamps = false;
}
