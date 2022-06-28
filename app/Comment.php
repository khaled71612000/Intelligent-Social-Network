<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\{Post, User, CommentVote};
use JWTAuth;

class Comment extends Model
{
    //
    // protected $appends = ['countVotes'];
    protected $guarded = [];
    protected $withCount = ['upvotes', 'downvotes'];
    protected $hidden = ['votes'];
    protected $with = ['user'];
    protected $appends = ['current_user_vote'];
    

    public function post() {
        return $this->belongsTo(Post::class);
    }
    public function user() {
        return $this->belongsTo(User::class)->select('id', 'name', 'avatar', 'gender_id');
    }

    public function upvotes() {
        return $this->hasMany(CommentVote::class, 'comment_id')->where('vote', 1);
    }
    public function downvotes() {
        return $this->hasMany(CommentVote::class, 'comment_id')->where('vote', 0);
    }

    public function votes() {
        return $this->hasMany(CommentVote::class, 'comment_id');
    }

    public function getCurrentUserVoteAttribute() {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            return $this->currentUserVote($user->id);
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function currentUserVote($user_id) {
        $vote_item = $this->votes->where('user_id', $user_id);
        
        if($vote_item->isNotEmpty()) {
            return $vote_item->values()[0]->vote;
        }
        return null;
    }

    // public function getUpvotesAttribute() {
    //     return $this->votes->where('vote', 1)->count();
    // }

    // public function getDownvotesAttribute() {
    //     return $this->votes->where('vote', 0)->count();
    // }

   
}
