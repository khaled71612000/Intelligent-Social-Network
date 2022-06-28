<?php

use Illuminate\Database\Seeder;

class EmotionalSupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $happy = [
            
        ];
        $sad = [
            "Don’t give up when dark times come. The more storms you face in life, the stronger you’ll be. Hold on. Your greater is coming.",
            "Stop feeling sorry for yourself and you will be happy.",
            "Life is a mixture of sunshine and rain, teardrops and laughter, pleasure and pain. Just remember, there was never a cloud that the sun couldn’t shine through.",
            "I know you, you are awesome, you are strong and you will be able to make things better.",
            "There is nothing in the world more constant than changes! Do not forget it when a black stripe appears in your life.",
            "Stop searching the world for treasure, the real treasure is in yourself.
            Cheer up my friend, I will be here for you now and until the end of time, forever and ever, love.",
            "To be a great champion you must believe you are the best. If you’re not, pretend you are.",
            "No matter what you’re going through, it’s just a matter of time; give it time and it will pass away. Cheer up, my good friend.",
            "I know things will turn out for your good on the long run. Cheer up, my buddy and remember to put on your beautiful glowing smiling face.",
            "Even if you have to force yourself to smile at times, please do and remember, things will be alright.",
            "It might take a long time, but things will be alright with time, please don’t lose hope. Cheer up, my sweet friend.",
            "Sometimes, you don’t need to know how it’s going to work out, you just need to believe that it will work out for your good. Cheer up, buddy.",
            "Take a very deep breath, stay calm and I need you to know that everything will be okay. Okay?",

        ];
        $anger = [
            "Your mind is like this water my friend, when it is agitated it becomes difficult to see. But if you allow it to settle, the answer becomes clear.",
            "It is not the actions of others which trouble us, but rather it is our own judgments. Therefore remove those judgments and resolve to let go of your anger, and it will already be gone.",
            "Don’t hold to anger, hurt or pain. They steal your energy and keep you from love.",
            "Holding on to anger is like grasping a hot coal with the intent of throwing it at someone else; you are the one who gets burned.",
            "When angry, count ten before you speak; if very angry, a hundred.",
            "The one who angers you, controls you. Let your anger go and become free.",
            "It is wise to direct your anger towards problems — not people; to focus your energies on answers – not excuses",
            "A moment of patience in a moment of anger saves a thousand moments of Regret.",
            "Anger is a valid emotion. It’s only bad when it takes control and makes you do things you don’t want to do.",
            "The only person you hurt when you stay angry or hold grudges is you. Forgive everyone, including yourself.",
        ];
        $fear = [
            "You can’t always control what goes on outside. But you can always control what goes on inside",
            "Do not let your difficulties fill you with anxiety; after all it is only in the darkest nights that stars shine more brightly.",
            "It’s OKAY to be scared. Being scared means you’re about to do something really, really brave.",
            "I promise you nothing is as chaotic as it seems. Nothing is worth diminishing your health. Nothing is worth poisoning yourself into stress, anxiety, and fear",
            "You may not control all the events that happen to you, but you can decide not to be reduced by them",
            
        ];
        $neutral = [

        ];

        $emotional_support_quotes = [];

        foreach ($sad as $key => $value) {
            $row = ["emotion" => "sad", "quote" => $value];
            array_push($emotional_support_quotes, $row);
        }

        foreach ($anger as $key => $value) {
            $row = ["emotion" => "angry", "quote" => $value];
            array_push($emotional_support_quotes, $row);
        }

        foreach ($fear as $key => $value) {
            $row = ["emotion" => "fear", "quote" => $value];
            array_push($emotional_support_quotes, $row);
        }

        DB::table("emotional_supports")->insert($emotional_support_quotes);
    }
}
