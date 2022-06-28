<?php

use Illuminate\Database\Seeder;

class GrantTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // grant_first_second, grant_second_first, none
        DB::table("grant_types")->insert([
            ["name" => "grant_first_second"],
            ["name" => "grant_second_first"],
            ["name" => 'both_granted'],
            ["name" => "none"]
        ]);
    }
}
