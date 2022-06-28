<?php

namespace App\Http\Controllers;

use App\Emotion;
use Illuminate\Http\Request;

class EmotionController extends Controller
{
    public function reset() {
        return Emotion::query()->update([
            'happy' => 0,
            'sad' => 0,
            'neutral' => 0,
            'fear' => 0,
            'angry' => 0,
        ]);
    }
}
