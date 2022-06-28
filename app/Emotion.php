<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emotion extends Model
{
    //
    protected $table = "user_emotion";
    protected $primaryKey = "user_id";
    protected $fillable = ['user_id', 'updated_at'];
    protected $hidden = ['user_id', 'updated_at'];
    public $timestamps = false;

    public $ai_to_dbcolumn = [
        "joy" => "happy",
        "sadness" => "sad",
        "anger" => "angry",
        "fear" => "fear",
        "neutral" => "neutral"
    ];

    public function mapEmotion($prediction) {
        // Function to change the prediction results of emotion analysis
        return $this->ai_to_dbcolumn["$prediction"];
    }

}
