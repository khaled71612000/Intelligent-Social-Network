<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\VAKType;

class VAKInsights extends Model
{
    //
    protected $table = "vak_insights";
    public $timestamps = false;

    protected $casts = [
        'content' => 'json'
    ];


    public function vak_type() {
        return $this->hasOne(VAKType::class, 'id');
    }
}
