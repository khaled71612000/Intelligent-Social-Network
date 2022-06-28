<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{User, GrantTypes};
class Relationship extends Model
{
    //
    protected $table = 'relationships';
    public $timestamps = true;
    public function users() {
        return $this->belongsToMany(User::class, "user_relationship", "relationship_id", "id");
    }

    // public function grant_type() {
    //     return $this->belongsToMany(GrantTypes::class, "user_relationship", "grant_type", "id");
    // }
}
