<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{User, Post, Tag};
use JWTAuth;

class Community extends Model
{
    //
    static $coverPath = "/public/files/community/cover/";
    protected $coverPathForClient = "/storage/files/community/cover/";
    protected $defaultCover = 'default.jpg';

    protected $hidden = ['pivot', 'updated_at'];
    protected $guarded = [];
    protected $appends = ['cover_full_path', 'followers'];


    public function getCoverFullPathAttribute() {
        $url = "http://127.0.0.1:8000" ;//url('\/');
        $full_path = $url. $this->coverPathForClient . ($this->cover ?? $this->defaultCover);
        return $full_path;
    }

    public function getFollowersAttribute() {
        return $this->users_following()->count();
    }

    public function users_following() {
        return $this->belongsToMany(User::class, "community_followers", "community_id", "user_id");
    }

    public function owner() {
        return $this->hasOne(User::class, 'owner_id');
    }

    public function posts() {
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    public function get_related_communities() {
        // Get related communities which is not 'this' and not already followed by the current user
        $related_communities = [];
        try {
            $user = JWTAuth::parseToken()->authenticate();
            $followed_communities_ids = $user->followed_communities->pluck('id')->toArray();
            array_push($followed_communities_ids, $this->id);
            $related_communities = Community::select(['id', 'title'])->whereNotIn('id', $followed_communities_ids)->limit(5)->get();
        } catch (\Throwable $th) {
            $related_communities = Community::select(['id', 'title'])->where('id', '<>', $this->id)->limit(5)->get();
        }
        finally {
            return $related_communities;
        }
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'communities_tags', 'community_id', 'tag_id');
    }
}
