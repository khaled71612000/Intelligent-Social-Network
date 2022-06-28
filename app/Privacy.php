<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{User, PrivacyTypes};

class Privacy extends Model
{
    //
    // protected $fillable = ['user_id', 'updated_at'];
    protected $primaryKey = 'user_id';
    protected $hidden = [
        'user_id',
        'updated_at',
        'email_type_id',
        'phone_type_id',
        'dob_type_id',
        'country_type_id',
        'hobby_type_id',
        'gender_type_id',
        'join_date_type_id',
        'personality_type_id',
        'emotion_type_id',
        'learning_style_type_id',
        'friends_type_id',
    ];
    public $with = ['email', 'phone_number', 'dob', 'country', 'hobby', 'gender', 'join_date', 'personality', 'emotions', 'learning_style', 'friends'];
    public $timestamps = false;
    
    public function users() {
        return $this->hasMany(User::class);
    }


    public function email() {
        return $this->belongsTo(PrivacyTypes::class, "email_type_id", "id");
    }

    public function phone_number() {
        return $this->belongsTo(PrivacyTypes::class, "phone_type_id", "id");
    }

    public function dob() {
        return $this->belongsTo(PrivacyTypes::class, "dob_type_id", "id");
    }

    public function country() {
        return $this->belongsTo(PrivacyTypes::class, "country_type_id", "id");
    }

    public function hobby() {
        return $this->belongsTo(PrivacyTypes::class, "hobby_type_id", "id");
    }

    public function gender() {
        return $this->belongsTo(PrivacyTypes::class, "gender_type_id", "id");
    }

    public function join_date() {
        return $this->belongsTo(PrivacyTypes::class, "join_date_type_id", "id");
    }

    public function personality() {
        return $this->belongsTo(PrivacyTypes::class, "personality_type_id", "id");
    }

    public function emotions() {
        return $this->belongsTo(PrivacyTypes::class, "emotion_type_id", "id");
    }

    public function learning_style() {
        return $this->belongsTo(PrivacyTypes::class, "learning_style_type_id", "id");
    }

    public function friends() {
        return $this->belongsTo(PrivacyTypes::class, "friends_type_id", "id");
    }
}
