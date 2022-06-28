<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JWTAuth;


class UserController extends Controller
{
    //

    public function get(Request $request, $id, $query) {
        
    }

    public function getNotifications(User $user) {
        $request_user = JWTAuth::parseToken()->authenticate();
        $response = ['state' => 0, 'notifications' => null];
        if($user->id == $request_user->id) {
            $notificationTypesIgnored = [
                "App\Notifications\Emotification",
                "App\Notifications\UserAttributeChanged",
                // "App\"
            ];
            $response['state'] = 1;
            $response['notifications'] = $user->notifications->whereNotIn('type', $notificationTypesIgnored)->take(10)->flatten();
        }
        return json_encode($response);
    }

    public function show(User $user) {
        $response = ['state' => 1, 'user' => null];
        try {
            $request_user = JWTAuth::parseToken()->authenticate();
            $user->applyPrivacy($request_user->id, "friend");
        } catch (\Throwable $th) {
            $user->applyPrivacy(-1, ""); // non-existing id represents a user having no account, just sticking his nose into the system
        }
        finally{
            $response['user'] = $user;
            return json_encode($response);
        }
    }
}
