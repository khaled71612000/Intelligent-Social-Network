<?php

namespace App\Http\Controllers;

use App\Relationship;
use App\UserRelationship;
use Illuminate\Http\Request;
use App\Events\{FriendRequestSent, FriendRequestAccepted, EmotificationGranted};
use App\User;
use App\{Chat, UserChat};
use App\{RelationshipIssues, PersonalityTypes};

use JWTAuth;

class RelationshipController extends Controller
{
    
    public function addFriend(User $receiver) {
        // Create record in relationships & Fire event to request receiver
        $response = ['state' => 0, 'data' => null];
        $sender = JWTAuth::parseToken()->authenticate();
        // Initialize data of relationship
        $user1_id = min([$sender->id, $receiver->id]);
        $user2_id = max([$sender->id, $receiver->id]);
        $relationship_type_id = $sender->id == $user1_id ? 1 : 2;

        // Create relationship
        UserRelationship::create([
            'user1_id' => $user1_id,
            'user2_id' => $user2_id,
            'relationship_id' => $relationship_type_id
        ]);

        // Fire event
        $friendRequestEvent = new FriendRequestSent($sender, $receiver);
        event($friendRequestEvent);

        $response['state'] = 1;
        $response['data'] = $friendRequestEvent->getDataForUser();
        return json_encode($response);
    }


    public function acceptFriend(User $sender) {
        // Update relationship record 
        $response = ['state' => 0, 'friend' => null, 'chat' => null];
        $receiver = JWTAuth::parseToken()->authenticate();
            
        // Initialize data
        $user1_id = min([$sender->id, $receiver->id]);
        $user2_id = max([$sender->id, $receiver->id]);

        // Update relationship
        $relationship_updated = UserRelationship::where([
            ['user1_id', '=', $user1_id],
            ['user2_id', '=', $user2_id],
            ['relationship_id', '<', 3],
        ])->update(['relationship_id' => 3]);

        // Notify users if relationship is updated successfully
        if($relationship_updated) {
            // Creat new empty chat
            $chat = Chat::create(); // create new chat
            $chat = $chat->only(['id', 'created_at', 'n_messages']);
            $chat['friend_id'] = $sender->id;
            UserChat::create([
                'chat_id' => $chat['id'],
                'user1_id' => $user1_id,
                'user2_id' => $user2_id
            ]);
            // Fire event & notify user
            event(new FriendRequestAccepted($sender, $receiver));
            $response['state'] = 1;
            $response['friend'] = $sender->applyPrivacy(-1, "friend");
            $response['chat'] = $chat;
            ;
        }
                
        return json_encode($response);
    }

    public function cancelFriendRequest(User $receiver) {
        $sender = JWTAuth::parseToken()->authenticate();
        $response = ['state' => 0];
        $user1_id = min([$receiver->id, $sender->id]);
        $user2_id = max([$receiver->id, $sender->id]);
        $response['state'] = UserRelationship::where([
            ['user1_id', '=', $user1_id],
            ['user2_id', '=', $user2_id],
            ['relationship_id', '<', 3]
        ])->delete();
        $response['state'] = 1;
        return json_encode($response);
    }

    public function unfriend($friend_id) {
        $response = ['state' => 0];
        $user = JWTAuth::parseToken()->authenticate();
        $user1_id = min([$user->id, $friend_id]);
        $user2_id = max([$user->id, $friend_id]);
        $response['state'] = UserRelationship::where([
            ['user1_id', '=', $user1_id],
            ['user2_id', '=', $user2_id],
            ['relationship_id', '=', 3]
        ])->delete();
        return json_encode($response);
    }


    public function emotify(User $friend) {
        // Create record in relationships & Fire event to request receiver
        $response = ['state' => 0];
        $user = JWTAuth::parseToken()->authenticate();
        // Initialize data of relationship
        $user1_id = min([$user->id, $friend->id]);
        $user2_id = max([$user->id, $friend->id]);
        $grant_type_id = ($friend->hasEmotifiable($user->id) ? 3 : ($user->id == $user1_id ? 1 : 2));

        // Create relationship
        $relationship_updated = UserRelationship::where([
            ['user1_id', '=', $user1_id],
            ['user2_id', '=', $user2_id],
            ['relationship_id', '=', 3],
        ])->update(['grant_type' => $grant_type_id]);

        if($relationship_updated) {
            // Fire event
            $emotificationGrantedEvent = new EmotificationGranted($user, $friend);
            event($emotificationGrantedEvent);

            $response['state'] = 1;
        }
        
        return json_encode($response);
    }    

    public function unemotify(User $friend) {
        $response = ['state' => 0];
        $user = JWTAuth::parseToken()->authenticate();
        $user1_id = min([$user->id, $friend->id]);
        $user2_id = max([$user->id, $friend->id]);

        $grant_type_id = $friend->hasEmotifiable($user->id) ? ($user1_id == $user->id ? 2 : 1) : 4;

        $relationship_updated = UserRelationship::where([
            ['user1_id', '=', $user1_id],
            ['user2_id', '=', $user2_id],
            ['relationship_id', '=', 3]
        ])->update(['grant_type' => $grant_type_id]);

        if($relationship_updated)
            $response['state'] = 1;

        return json_encode($response);
    }

    public function blockUser($blocked_id) {
        // Update/Create relationship to block
    }

    public function unblockUser($blocked_id) {
        // Remove the relationship record between blocker & blocked
    }



    public function getInsights($personality1_type, $personality2_type) {
        $response = ["state" => 0, 'insight' => null];
        $personalities = PersonalityTypes::whereIn("type", [$personality1_type, $personality2_type])->get();
        if($personalities->count() == 2) {
            $personality1 = $personalities[0];
            $personality2 = $personalities[1];
            $personality1_id = min([$personality1->id, $personality2->id]);
            $personality2_id = max([$personality1->id, $personality2->id]);
            $insights = RelationshipIssues::where([
                ['personality1_id', '=', $personality1_id],
                ['personality2_id', '=', $personality2_id]
            ])->get();
            if(!$insights->isEmpty()){
                $response['insight'] = $insights[0];
                $response['state'] = 1;
            }
        }

        return json_encode($response);
    }
}
