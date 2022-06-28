<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\VAKInsights;

class VAKType extends Model
{
    //
    protected $table = 'vak_types';
    public $timestamps = false;

    
    protected $with = ['insights'];

    public function insights() {
        return $this->hasOne(VAKInsights::class, 'id');
    }
}
