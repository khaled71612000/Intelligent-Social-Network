<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\VAK;

class Personality extends Model
{
    //
    protected $table = "personalities";
    protected $primaryKey = "user_id";
    protected $guarded = [];
    public $timestamps = false;
    private static $defaultInitialPercentage = 3; // initial assessment of test result

    // public function user() {
    //     return $this->belongsTo(User::class, "user_id");
    // }

    private static $level1 = ['N', 'S', 'F', 'T']; // Personality test, Question 1 choices

    private static $level2 = [
        ['Ni', 'Ne'],
        ['Si', 'Se'],
        ['Fi', 'Fe'],
        ['Ti', 'Te']
    ]; // Question 2 choices
    
    private static $level3 = [
        ['Te', 'Fe'],
        ['Ti', 'Fi'],
        ['Te', 'Fe'],
        ['Ti', 'Fi'],
        ['Ne', 'Se'],
        ['Ni', 'Si'],
        ['Ne', 'Se'],
        ['Ni', 'Si']
    ]; // Question 3 choices

    public static $cognitive_functions_opposites = [
        'Ni' => 'Se',
        'Se' => 'Ni',
        'Ti' => 'Fe',
        'Fe' => 'Ti',
        'Fi' => 'Te',
        'Te' => 'Fi',
        'Si' => 'Ne',
        'Ne' => 'Si'
    ];

    public static $mbti_to_cognitive = [
        'INTJ' => 'NiTe',
        'INFJ' => "NiFe",
        'ENTP' => 'NeTi',
        'ENFP' => 'NeFi',
        'ENTJ' => 'TeNi',
        'ESTJ' => 'TeSi',
        'INTP' => 'TiNe',
        'ISTP' => 'TiSe',
        'ENFJ' => 'FeNi',
        'ESFJ' => 'FeSi',
        'INFP' => 'FiNe',
        'ISFP' => 'FiSe',
        'ISTJ' => 'SiTe',
        'ISFJ' => 'SiFe',
        'ESTP' => 'SeTi',
        'ESFP' => 'SeFi'
    ];

    public static $cognitive_to_mbti = [
        'NiTe' => 'INTJ',
        'NiFe' => 'INFJ',
        'NeTi' => 'ENTP',
        'NeFi' => 'ENFP',
        'TeNi' => 'ENTJ',
        'TeSi' => 'ESTJ',
        'TiNe' => 'INTP',
        'TiSe' => 'ISTP',
        'FeNi' => 'ENFJ',
        'FeSi' => 'ESFJ',
        'FiNe' => 'INFP',
        'FiSe' => 'ISFP',
        'SiTe' => 'ISTJ',
        'SiFe' => 'ISFJ',
        'SeTi' => 'ESTP',
        'SeFi' => 'ESFP'
    ]; // I could use array_flip, but I need to use _constructor first, I don't want to use it :)



    public static function evaluate_test($answers) {
        [$answer1, $answer2, $answer3] = $answers;
        $cog_function_direction = self::$level2[$answer1]; // ie. ['Te' : 'Ti']  , in general it's 'T'
        $Dominant = $cog_function_direction[$answer2];
        $Auxiliary = self::$level3[$answer1 * 2 + $answer2][$answer3];
        $cog_func_stack = $Dominant . $Auxiliary;
        $personality_type = self::$cognitive_to_mbti[$cog_func_stack];
        return $personality_type;
    }

    public static function customCreate($user_id, $personality_type) {
        // insert new record with custom values
        $row = array();
        $row["user_id"] = $user_id;
        $row[$personality_type] = 3;
        return self::create($row);
    }
}
