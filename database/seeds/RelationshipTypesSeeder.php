<?php

use Illuminate\Database\Seeder;

class RelationshipTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // pending_first_second, pending_second_first, friend, block_first_second, block_second_first
        DB::table("relationships")->insert([
            ["name" => "pending_first_second"],
            ["name" => "pending_second_first"],
            ["name" => "friend"],
            ["name" => "block_first_second"],
            ["name" => "block_second_first"]
        ]);
    }
}
