<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\{
    Hobby, Message, Personality, personalityType, 
    Chat, Country, Gender, Emotion, EmotionLongterm, 
    Privacy, Relationship, Report, VAK, Post, Comment, 
    Community, community_follower, CommentVote, PostLike
    };

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;


    static $profilePicPath = "/public/files/user/profile/";
    static $coverPath = "/public/files/user/cover/";

    protected $profilePicPathClient = "/storage/files/user/profile/";
    protected $coverPathClient = "/storage/files/user/cover/";

    protected $defaultAvatar = "default.jpg";
    protected $defaultCover = "default.jpg";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'avatar', 'cover', 'country_id',
        'gender_id', 'dob', 'exp', 'bio', 'nickname', 'last_activity'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 
        'RelationshipsAsUser1', 'RelationshipsAsUser2',
        'SentRequestsAsUser1', 'SentRequestsAsUser2',
        'ReceivedRequestsAsUser1', 'ReceivedRequestsAsUser2',
        'FriendsAsUser1', 'FriendsAsUser2',
        'BlockingAsUser1', 'BlockingAsUser2',
        "BlockedAsUser1", "BlockedAsUser2",
        'chatAsSender', 'chatAsReciever',
        'relationships', 'chats', 'country_id',
        'country', 'gender_id',
        'email_verified_at', 'last_activity',
        "u_emotions", "personalitySummary", "vak",

        'sentRequests',
        'receivedRequests',
        'friends',
        'blockedUsers',
        'blockedBy',
        'emotions',
        'emotifiables',
        'emotifiers',
        "privacy"
    ];

    protected $sensitiveAttributes = [
        "sentRequests",
        "receivedRequests",
        "friends",
        "blockedUsers",
        "blockedBy",
        "emotions",
        "emotifiables",
        "emotifiers",
        "privacy",
        'chats',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['relationships', 'chats', 'sentRequests', 'receivedRequests', 'friends', "blockedUsers", "blockedBy", "emotions", "personality", "learning_style", "emotifiables", "emotifiers", 'avatar_full_path', 'cover_full_path'];

    protected $with = ['country', 'privacy', 'gender'];

    public function loadSensitiveAttributes() {
        return $this->makeVisible($this->sensitiveAttributes);
    }

    public function minimizeAttributes() {
        return $this->only(['id', 'name', 'avatar_full_path', 'personality', 'gender']);
    }

    public function getAvatarFullPathAttribute() {
        $url = "http://127.0.0.1:8000" ;//url('\/');
        $full_path = $url. $this->profilePicPathClient . ($this->avatar ?? $this->defaultAvatar) ;
        return $full_path;
    }

    public function getCoverFullPathAttribute() {
        $url = "http://127.0.0.1:8000"; // url('\/);
        $full_path = $url. $this->coverPathClient . ($this->cover ?? $this->defaultCover);
        return $full_path;
    }

    public function getemotionsAttribute() {
        $emotion_list = $this->u_emotions->toArray();
        $max_value = max($emotion_list);
        if($max_value == 0)
            return "Neutral";
        $emotion_name = \array_search($max_value, $emotion_list);
        return ucfirst($emotion_name);
    }
    


    public function getPersonalityAttribute() {
        $personality_list = $this->personalitySummary->toArray();
        unset($personality_list["user_id"]);
        $max_value = max($personality_list);
        $personality_type = \array_search($max_value, $personality_list);
        return $personality_type;
    }

    public function getLearningStyleAttribute() {
        $vak_list = $this->vak->toArray();
        unset($vak_list["user_id"]);
        $max_value = max($vak_list);
        $learning_style = \array_search($max_value, $vak_list);
        return ucfirst($learning_style);
    }

    // _________ Relationships (many to many)
    public function RelationshipsAsUser1() {
        return $this->belongsToMany(Relationship::class, "user_relationship", "user1_id")->withPivot(['user2_id', 'grant_type'])->as("details");//->withPivot("user2_id");//->where("id", '!=', 'user1_id');
    }
    public function RelationshipsAsUser2() {
        return $this->belongsToMany(Relationship::class, "user_relationship", "user2_id")->withPivot(['user1_id', 'grant_type'])->as("details");//->withPivot('user1_id');
    }

    // RECEIVED FRIEND REQUESTS
    public function ReceivedRequestsAsUser1() {
        return $this->belongsToMany(Relationship::class, "user_relationship", "user1_id")->where("id", 2)->withPivot(['user2_id', 'grant_type', 'created_at'])->as("details");//->withPivot("user2_id");//->where("id", '!=', 'user1_id');
    }
    public function ReceivedRequestsAsUser2() {
        return $this->belongsToMany(Relationship::class, "user_relationship", "user2_id")->where("id", 1)->withPivot(['user1_id', 'grant_type', 'created_at'])->as("details");//->withPivot('user1_id');
    }
    // END RECEIVED FRIEND REQUESTS

    // RECEIVED FRIEND REQUESTS
    public function SentRequestsAsUser1() {
        return $this->belongsToMany(Relationship::class, "user_relationship", "user1_id")->where("id", 1)->withPivot(['user2_id', 'grant_type', 'created_at'])->as("details");//->withPivot("user2_id");//->where("id", '!=', 'user1_id');
    }
    public function SentRequestsAsUser2() {
        return $this->belongsToMany(Relationship::class, "user_relationship", "user2_id")->where("id", 2)->withPivot(['user1_id', 'grant_type', 'created_at'])->as("details");//->withPivot('user1_id');
    }
    // END RECEIVED FRIEND REQUESTS

    // FRIENDS
    public function FriendsAsUser1() {
        return $this->belongsToMany(Relationship::class, "user_relationship", "user1_id")->where("id", 3)->withPivot(['user2_id', 'grant_type', 'created_at'])->as("details");//->withPivot("user2_id");//->where("id", '!=', 'user1_id');
    }
    public function FriendsAsUser2() {
        return $this->belongsToMany(Relationship::class, "user_relationship", "user2_id")->where("id", 3)->withPivot(['user1_id', 'grant_type', 'created_at'])->as("details");//->withPivot('user1_id');
    }
    // END FRIENDS


    // BLOCKEDs users
    public function BlockingAsUser1() {
        return $this->belongsToMany(Relationship::class, "user_relationship", "user1_id")->where("id", 4)->withPivot(['user2_id', 'grant_type'])->as("details");//->withPivot("user2_id");//->where("id", '!=', 'user1_id');
    }
    public function BlockingAsUser2() {
        return $this->belongsToMany(Relationship::class, "user_relationship", "user2_id")->where("id", 5)->withPivot(['user1_id', 'grant_type'])->as("details");//->withPivot('user1_id');
    }
    // END BLOCKEDs users

    // users who BLOCKED me
    public function BlockedAsUser1() {
        return $this->belongsToMany(Relationship::class, "user_relationship", "user1_id")->where("id", 5)->withPivot(['user2_id', 'grant_type'])->as("details");//->withPivot("user2_id");//->where("id", '!=', 'user1_id');
    }
    public function BlockedAsUser2() {
        return $this->belongsToMany(Relationship::class, "user_relationship", "user2_id")->where("id", 4)->withPivot(['user1_id', 'grant_type'])->as("details");//->withPivot('user1_id');
    }
    // END users who BLOEKCED me

    // merge
    public function getRelationshipsAttribute() {
        $r1 = $this->RelationshipsAsUser1;
        
        $r2 = $this->RelationshipsAsUser2;
        return $r1->push($r2)->flatten();
    }

    public function getSentRequestsAttribute() {
        $f1 = $this->SentRequestsAsUser1;
        $f2 = $this->SentRequestsAsUser2;
        $id = $this->id;
        $sensitiveAttributes = $this->sensitiveAttributes;
        $requests = $f1->push($f2)->flatten()->pluck("details")->map(function($detail) use($id, $sensitiveAttributes) {
            $request_id = $detail->user1_id == $id ? $detail->user2_id : $detail->user1_id;
            $user = User::select(["id", "name", "avatar", "gender_id"])->where("id", $request_id)->get()->makeHidden($sensitiveAttributes)[0];
            $request = collect(['user' => $user, 'created_at' => $detail->created_at]);
            return $request;
        });
        return $requests;
    }

    public function getReceivedRequestsAttribute() {
        $f1 = $this->ReceivedRequestsAsUser1;
        $f2 = $this->ReceivedRequestsAsUser2;
        $id = $this->id;
        $sensitiveAttributes = $this->sensitiveAttributes;
        $requests = $f1->push($f2)->flatten()->pluck("details")->map(function($detail) use($id, $sensitiveAttributes) {
            $request_id = $detail->user1_id == $id ? $detail->user2_id : $detail->user1_id;
            $user = User::select(["id", "name", "avatar", "gender_id"])->where("id", $request_id)->get()->makeHidden($sensitiveAttributes)[0];
            $request = collect(['user' => $user, 'created_at' => $detail->created_at]);
            return $request;
        });
        return $requests;
    }

    public function getFriendsAttribute() {
        $f1 = $this->FriendsAsUser1;
        $f2 = $this->FriendsAsUser2;
        $id = $this->id;
        $sensitiveAttributes = $this->sensitiveAttributes;
        $friends = $f1->push($f2)->flatten()->pluck("details")->map(function($detail) use($id, $sensitiveAttributes) {
            $friend_id = $detail->user1_id == $id ? $detail->user2_id : $detail->user1_id;
            $friend = User::select(["id", "name", "avatar", "gender_id"])->where("id", $friend_id)->get()->makeHidden($sensitiveAttributes);
            return $friend;
        })->flatten();
        return $friends;
    }

    public function getEmotifiablesAttribute() {
        // Return IDs of friends who are granted emotifications (notified with this.user.emotions)
        $emotifiables1 = $this->FriendsAsUser1->whereIn("details.grant_type", [1,3]);
        $emotifiables2 = $this->FriendsAsUser2->whereIn("details.grant_type", [2,3]);
        $id = $this->id;
        $sensitiveAttributes = $this->sensitiveAttributes;
        $emotifiables = $emotifiables1->push($emotifiables2)->flatten()->pluck("details")->map(function($detail) use($id, $sensitiveAttributes) {
            $friend_id = $detail->user1_id == $id ? $detail->user2_id : $detail->user1_id;
            return $friend_id;
        })->flatten();
        return $emotifiables;
    }

    public function getEmotifiersAttribute() {
        // Return IDs of friends who grant this.user emotifications (this.user is notified with friend.emotions)
        $emotifiables1 = $this->FriendsAsUser1->whereIn("details.grant_type", [2,3]);
        $emotifiables2 = $this->FriendsAsUser2->whereIn("details.grant_type", [1,3]);
        $id = $this->id;
        $sensitiveAttributes = $this->sensitiveAttributes;
        $emotifiables = $emotifiables1->push($emotifiables2)->flatten()->pluck("details")->map(function($detail) use($id, $sensitiveAttributes) {
            $friend_id = $detail->user1_id == $id ? $detail->user2_id : $detail->user1_id;
            return $friend_id;
        })->flatten();
        return $emotifiables;
    }


    public function getBlockedUsersAttribute() {
        $f1 = $this->BlockingAsUser1;
        $f2 = $this->BlockingAsUser2;
        $id = $this->id;
        $sensitiveAttributes = $this->sensitiveAttributes;
        $blocked = $f1->push($f2)->flatten()->pluck("details")->map(function($detail) use($id, $sensitiveAttributes) {
            $blocked_id = $detail->user1_id == $id ? $detail->user2_id : $detail->user1_id;
            $blocked_user = User::select(["id", "name", "avatar"])->where("id", $blocked_id)->get()->makeHidden($sensitiveAttributes);
            return $blocked_user;
        })->flatten();
        return $blocked;
    }

    public function getBlockedByAttribute() {
        $f1 = $this->BlockedAsUser1;
        $f2 = $this->BlockedAsUser2;
        $id = $this->id;
        $sensitiveAttributes = $this->sensitiveAttributes;
        $blocked = $f1->push($f2)->flatten()->pluck("details")->map(function($detail) use($id, $sensitiveAttributes) {
            $blocked_id = $detail->user1_id == $id ? $detail->user2_id : $detail->user1_id;
            return $blocked_id;
        })->flatten();
        return $blocked;
    }

    // _________ Relationships END ________

    // _________ Chat (many to many)
    public function chatAsSender() {
        return $this->belongsToMany(Chat::class, "user_chat", "user1_id")->withPivot("user2_id")->as("details");
    }
    public function chatAsReciever() {
        return $this->belongsToMany(Chat::class, "user_chat", "user2_id")->withPivot("user1_id")->as("details");
    }

    public function getChatsAttribute() {
        $sender = $this->chatAsSender;
        $reciever = $this->chatAsReciever;
        $chats = $sender->push($reciever)->flatten()->map(function ($chat) {
            $friend_id = $chat->details->user1_id == $this->getKey() ? $chat->details->user2_id : $chat->details->user1_id;
            return [
                "id" => $chat->id,
                "n_messages" => $chat->n_messages,
                "friend_id" => $friend_id,
                "created_at" => $chat->created_at
                ];
        });
        return $chats;
    }
    // _________ Chat END __________


    public function isFriendWith($user2_id) {
        return $this->friends->where('id', $user2_id)->count() > 0;
    }

    public function hasEmotifiable($friend_id) {
        return $this->emotifiables->contains($friend_id);
    }

    public function getSupportedPrivacyRelationships() {
        $result = [
            'privacy.email',
            'privacy.phone',
            'privacy.dob',
            'privacy.country',
            'privacy.hobby',
            'privacy.gender',
            'privacy.join_date',
            'privacy.personality',
            'privacy.emotion',
            'privacy.learning_style',
            'privacy.friends',
        ];
        return $result;
    }


    public function applyPrivacy($request_user_id, $customRelation="") {
        // request_user = user who wants to view this.user profile or data
        // check if request user is (me) or a friend of me or other
        /*
        1- Private
        2- Friend
        3- Public
        */

        $forMe = $request_user_id == $this->id || $customRelation == "self";
        $forFriend = $this->isFriendWith($request_user_id) || $customRelation == "friend";
    
        // Apply privacy for the user viewing his profile => view everything
        if($forMe) {
            $this->load(['followed_communities', 'communities'])->loadSensitiveAttributes();
        }

        // Apply privacy for other users viewwing his profile => apply rules individually
        else{
            $privacy = collect($this->privacy);
            $privacy->map(function($rule, $key) use($forFriend) {
                if($rule['type'] == "Public")
                    $this->makeVisible("$key");
                else if ($rule['type'] == "Friend")
                    $forFriend ? $this->makeVisible("$key") : $this->makeHidden("$key");
                else if($rule['type'] == "Private")
                    $this->makeHidden("$key");
            });
        }

        // Apply specific privacy for Emotifications
        $this->hasEmotifiable($request_user_id) ? $this->makeVisible('emotions') : $this->makeHidden('emotions');

        return $this;
    }


    public function country() {
        return $this->belongsTo(Country::class, "country_id", "id");
    }

    public function gender() {
        return $this->belongsTo(Gender::class, 'gender_id', 'id');
    }

    public function communities() {
        return $this->hasMany(Community::class, 'owner_id');
    }

    public function followed_communities() {
        return $this->belongsToMany(Community::class, "community_followers", "user_id", "community_id");
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function comment_vote() {
        return $this->hasMany(CommentVote::class);
    }

    public function u_emotions() {
        return $this->hasOne(Emotion::class);
    }

    public function u_emotions_longterm() {
        return $this->hasMany(EmotionLongterm::class, "emotion_longterm", "user_id");
    }

    public function hobbies() {
        return $this->belongsToMany(Hobby::class, "user_hobby", "user_id", "hobby_id")->withTimestamps();
    }

    public function likes() {
        return $this->hasMany(PostLike::class);
    }

    public function personalitySummary() {
        return $this->hasOne(Personality::class, "user_id");
    }

    public function personality() {
        return $this->belongsTo(PersonalityTypes::class, "personality_types");
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    

    public function privacy() {
        return $this->hasOne(Privacy::class);
    }

    public function reports() {
        return $this->hasMany(Report::class);
    }

    public function vak() {
        return $this->hasOne(VAK::class);
    }

    public function messages() {
        return $this->hasManyThrough(Message::class, Chat::class, "id", "user_id");
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
