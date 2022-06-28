<?php

use Illuminate\Database\Seeder;

class PrivacyTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("privacy_types")->insert([
            ['id' => 1, "type" => "Private"],
            ['id' => 2, "type" => "Friend"],
            ['id' => 3, "type" => "Public"],
        ]);
    }
}
