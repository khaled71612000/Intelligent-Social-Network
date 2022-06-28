<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class VAK extends Model
{
    //
    protected $table = "user_vak";
    protected $primaryKey = "user_id";
    public $defaultInitialPercentage = 60; // initial assessment of test result
    protected $fillable = ['user_id'];
    protected $hidden = ['user_id', 'updated_at'];
    const CREATED_AT = null;
    public static $mbti_to_vak = [
        'INTJ' => 'Visual',
        'INFJ' => "Visual",
        'ENTP' => 'Auditory',
        'ENFP' => 'Auditory',
        'ENTJ' => 'Visual',
        'ESTJ' => 'Kinesthetic',
        'INTP' => 'Auditory',
        'ISTP' => 'Kinesthetic',
        'ENFJ' => 'Visual',
        'ESFJ' => 'Kinesthetic',
        'INFP' => 'Auditory',
        'ISFP' => 'Kinesthetic',
        'ISTJ' => 'Visual',
        'ISFJ' => 'Visual',
        'ESTP' => 'Kinesthetic',
        'ESFP' => 'Kinesthetic'
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }
    public function summary() {
        return $this->all()->map->only(['Visual', 'Auditory', 'Kinesthetic'])[0];
    }
}
