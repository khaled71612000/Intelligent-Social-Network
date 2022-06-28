<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRelationship extends Model
{
    //
    protected $table = 'user_relationship';
    protected $fillable = ['user1_id', 'user2_id', 'relationship_id', 'grant_type'];
    protected $primaryKey = null;
    public $incrementing = false;
}
