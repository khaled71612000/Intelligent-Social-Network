<?php

use Illuminate\Database\Seeder;

class LearningStyleTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vak_types')->insert([
            ['id' => 1, 'type' => 'visual'],
            ['id' => 2, 'type' => 'auditory'],
            ['id' => 3, 'type' => 'kinesthetic'],
        ]);
    }
}
