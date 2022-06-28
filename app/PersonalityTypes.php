<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PersonalityInsights;
use App\RelationshipIssues;
use App\User;
class PersonalityTypes extends Model
{
    //
    protected $table = "personality_types";

    public function insight() {
        return $this->hasOne(PersonalityInsights::class, "personality_id");
    }

    public function issuesPart1() {
        return $this->hasMany(RelationshipIssues::class, "personality1_id");
    }
    public function issuesPart2() {
        return $this->hasMany(RelationshipIssues::class, "personality2_id");
    }

    public function users() {
        return $this->hasMany(User::class);
    }

    public function getMatchesAttribute() {
        $ip1 = $this->issuesPart1;
        $ip2 = $this->issuesPart2;
        return $ip1->push($ip2);
    }
}
