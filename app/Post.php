<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\{User, Community, Comment, PostLike, SharedPost};
use JWTAuth;

class Post extends Model
{
    //
    static $postImagePath = "/public/files/post/";

    protected $clientPostImagePath = "/storage/files/post/";
    protected $hidden = ['likes', 'shared_posts'];
    protected $appends = ['isShared', 'image_full_path', 'current_user_liked', 'current_user_commented'];
    protected $with = ['user:id,name,avatar', 'community'];
    protected $withCount = ['likes', 'comments', 'shared_posts'];    
    protected $guarded = [];

    public function community() {
        return $this->belongsTo(Community::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function likes() {
        return $this->hasMany(PostLike::class);
    }

    public function shared_posts() {
        return $this->hasMany(SharedPost::class);
    }

    public function getImageFullPathAttribute() {
        $url = "http://127.0.0.1:8000" ;//url('\/');
        $full_path = $this->image ? $url . $this->clientPostImagePath . $this->image : null;
        return $full_path;
    }

    public function loadSocialDetails() {
        return $this->loadCount(['likes', 'comments', 'shared_posts']);
    }

    // public function getCommentsCountAttribute() {
    //     return $this->comments->count();
    // }
    // public function getLikesCountAttribute() {
    //     return $this->likes->count();
    // }

    // public function getSharesCountAttribute() {
    //     return $this->shared_posts->count();
    // }
    public function getIsSharedAttribute() {
        $current_post_id = $this->id;
        return $this->shared_posts->contains('user_id', $this->user_id);
    }

    public function currentUserLiked($user_id) {
        return $this->likes->contains('user_id', $user_id);
    }
    public function currentUserCommented($user_id) {
        return $this->comments->contains('user_id', $user_id);
    }

    public function getCurrentUserLikedAttribute() {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            return $this->currentUserLiked($user->id);
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getCurrentUserCommentedAttribute() {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            return $this->currentUserCommented($user->id);
        } catch (\Throwable $th) {
            return false;
        }
    }
}
