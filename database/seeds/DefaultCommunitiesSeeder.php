<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DefaultCommunitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('communities')->insert([
            ['id' => 1, "owner_id" => 0,  'title' => 'INTJ', 'cover' => 'intj.png', 'description' => 'A group where all INTJs can communicate with each other & exchange their experiences', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, "owner_id" => 0,  'title' => 'INFJ', 'cover' => 'infj.png', 'description' => 'A group where all INFJs can communicate with each other & exchange their experiences','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, "owner_id" => 0,  'title' => 'ENTP', 'cover' => 'entp.png', 'description' => 'A group where all ENTPs can communicate with each other & exchange their experiences','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 4, "owner_id" => 0,  'title' => 'ENFP', 'cover' => 'enfp.png', 'description' => 'A group where all ENFPs can communicate with each other & exchange their experiences','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 5, "owner_id" => 0,  'title' => 'ENTJ', 'cover' => 'entj.png', 'description' => 'A group where all ENTJs can communicate with each other & exchange their experiences','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 6, "owner_id" => 0,  'title' => 'ESTJ', 'cover' => 'estj.png', 'description' => 'A group where all ESTJs can communicate with each other & exchange their experiences','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 7, "owner_id" => 0,  'title' => 'INTP', 'cover' => 'intp.png', 'description' => 'A group where all INTPs can communicate with each other & exchange their experiences','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 8, "owner_id" => 0,  'title' => 'ISTP', 'cover' => 'istp.png', 'description' => 'A group where all ISTPs can communicate with each other & exchange their experiences','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 9, "owner_id" => 0,  'title' => 'ENFJ', 'cover' => 'enfj.png', 'description' => 'A group where all ENFJs can communicate with each other & exchange their experiences','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 10, "owner_id" => 0,  'title' => 'ESFJ', 'cover' => 'esfj.png', 'description' => 'A group where all ESFJs can communicate with each other & exchange their experiences','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 11, "owner_id" => 0,  'title' => 'INFP', 'cover' => 'infp.png', 'description' => 'A group where all INFPs can communicate with each other & exchange their experiences','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 12, "owner_id" => 0,  'title' => 'ISFP', 'cover' => 'isfp.png', 'description' => 'A group where all ISFPs can communicate with each other & exchange their experiences','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 13, "owner_id" => 0,  'title' => 'ISTJ', 'cover' => 'istj.png', 'description' => 'A group where all ISTJs can communicate with each other & exchange their experiences','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 14, "owner_id" => 0,  'title' => 'ISFJ', 'cover' => 'isfj.png', 'description' => 'A group where all ISFJs can communicate with each other & exchange their experiences','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 15, "owner_id" => 0,  'title' => 'ESTP', 'cover' => 'estp.png', 'description' => 'A group where all ESTPs can communicate with each other & exchange their experiences','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 16, "owner_id" => 0,  'title' => 'ESFP', 'cover' => 'esfp.png', 'description' => 'A group where all ESFPs can communicate with each other & exchange their experiences','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}