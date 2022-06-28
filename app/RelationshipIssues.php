<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PersonalityTypes;

class RelationshipIssues extends Model
{
    //
    protected $table = "relationship_issues";
    public $timestamps = false;

    protected $casts = [
        'content' => 'json'
    ];



}
