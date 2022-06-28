<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Personality;
$factory->define(Personality::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max=20),
        'INTJ'=> 50, 
        'INFJ'=> 50,
        'ENTP'=> 50,
        'ENFP'=> 50,
        'ENTJ'=> 50,
        'ESTJ'=> 50,
        'INTP'=> 50,
        'ISTP'=> 50,
        'ENFJ'=> 50,
        'ESFJ'=> 50,
        'INFP'=> 50,
        'ISFP'=> 50,
        'ISTJ'=> 50,
        'ISFJ'=> 50,
        'ESTP'=> 50,
        'ESFP'=> 50
    ];
});
