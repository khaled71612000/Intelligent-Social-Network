<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{User, Comment, Post};

class CommentVote extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $guarded = [];
}
