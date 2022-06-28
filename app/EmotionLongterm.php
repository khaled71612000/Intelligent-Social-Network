<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmotionLongterm extends Model
{
    protected $table = "emotion_longterm";
    protected $primaryKey = "user_id";
    protected $fillable = ['user_id', 'updated_at'];
    protected $hidden = ['user_id', 'updated_at'];
    public $timestamps = false;
}
