<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    //
    protected $hidden = ['created_at', 'updated_at', 'post_id'];
    protected $guarded = [];
}
