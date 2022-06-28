<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('chat-{chat_id}', function ($user, $chat_id) {
    return $user->chats->contains('id', $chat_id);
});

Broadcast::channel('notification-{user_id}', function ($user, $user_id) {
    return (int) $user->id === (int) $user_id;
});

Broadcast::channel('post-{post_id}', function ($user, $post_id) {
    return true;
});