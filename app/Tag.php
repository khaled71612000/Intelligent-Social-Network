<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Community;

class Tag extends Model
{
    //
    protected $hidden = ['pivot'];
    public function communities() {
        return $this->belongsToMany(Community::class, 'communities_tags', 'tag_id', 'community_id');
    }
}
