<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PersonalityTypes;

class PersonalityInsights extends Model
{
    //
    protected $table = "personality_insights";
    protected $primaryKey = 'personality_id';

    protected $casts = [
        'content' => 'json'
    ];

    public function personality() {
        return $this->belongsTo(PersonalityTypes::class);
    }
}
