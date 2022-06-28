<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Privacy;

class PrivacyTypes extends Model
{
    //
    protected $table = 'privacy_types';

    public function privacy() {
        return $this->hasMany(Privacy::class, "email", "id");
    }
}
