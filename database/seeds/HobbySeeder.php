<?php

use Illuminate\Database\Seeder;

class HobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hobbies_values = [
            "reading", "writing", "music", "sports", "shopping", "hiking",
            "sweing", "swimming", "running", "skating", "traveling", "yoga",
            "graphic design", "art", "video Games", "volunteering", "programming",
            "photography", "dancing", "handcrafts"
        ];
        $hobbies = [];
        foreach ($hobbies_values as $value) {
            array_push($hobbies, [
                "name" => $value
            ]);
        }
        DB::table("hobbies")->insert($hobbies);

    }
}
