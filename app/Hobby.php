<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Hobby extends Model
{
    //
    protected $table = "hobbies";
    protected $hidden = ['pivot'];
    public function users() {
        return $this->belongsToMany(User::class, "user_hobby", "hobby_id", "user_id");
    }

    public static function registerNewHobbies($recieved_hobbies) {
        $current_hobbies = self::all()->pluck("name")->toArray();
        $new_hobbies = array_diff($recieved_hobbies, $current_hobbies);
        if ($new_hobbies) {
            $rows = [];
            foreach ($new_hobbies as $hobby) {
                array_push($rows, ['name' => $hobby]);
            }
            self::insert($rows);
        }
        return $new_hobbies;
    }

    public static function generateUserHobbyRows($hobby_rows) {
        $user_hobbies_rows = [];
        for($i = 0; $i < count($hobbies_rows); $i++) {
            array_push($user_hobbies_rows, ['user_id' => $user->id, 'hobby_id' => $hobbies_rows[$i]->id]);
        }
        return $user_hobbies_rows;
    }
}
