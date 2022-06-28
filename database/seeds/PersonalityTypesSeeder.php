<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PersonalityTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personality_types')->insert([
            ['id' => 1, 'type' => 'INTJ'],
            ['id' => 2, 'type' => 'INFJ'],
            ['id' => 3, 'type' => 'ENTP'],
            ['id' => 4, 'type' => 'ENFP'],
            ['id' => 5, 'type' => 'ENTJ'],
            ['id' => 6, 'type' => 'ESTJ'],
            ['id' => 7, 'type' => 'INTP'],
            ['id' => 8, 'type' => 'ISTP'],
            ['id' => 9, 'type' => 'ENFJ'],
            ['id' => 10, 'type' => 'ESFJ'],
            ['id' => 11, 'type' => 'INFP'],
            ['id' => 12, 'type' => 'ISFP'],
            ['id' => 13, 'type' => 'ISTJ'],
            ['id' => 14, 'type' => 'ISFJ'],
            ['id' => 15, 'type' => 'ESTP'],
            ['id' => 16, 'type' => 'ESFP'],
        ]);
    }
}
