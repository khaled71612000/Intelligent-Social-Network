<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $path = storage_path() . '/countries.json';
        $json = json_decode(file_get_contents($path, true));
        $countries = [];
        foreach ($json as $value) {
            array_push($countries, [
                "name" => $value->name,
                "code" => $value->code
            ]);
        }
        DB::table("countries")->insert($countries);
    }
}
