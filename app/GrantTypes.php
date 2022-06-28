<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Relationship;
class GrantTypes extends Model
{
    //
    protected $table = "grant_types";

    // public function relationships() {
    //     return $this->belongsToMany(Relationship::class, "user_relationship");
    // }
}
