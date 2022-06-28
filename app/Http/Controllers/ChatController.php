<?php

namespace App\Http\Controllers;
use App\Events\MessageSent;
use App\Events\InitChat;

use App\Chat;
use JWTAuth;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $messages_limit = 15;

    public function getChatWithMessages(Request $request=null, $chat_id) 
    {
        $chat = Chat::with(["messages" => function($query) {
            $query->select(["id", "chat_id", "user_id", "message", "url", "media", "read", "created_at"])
            ->latest("created_at")
            ->limit($this->messages_limit);
        }])->find($chat_id)->makeHidden(['n_messages_not_analyzed', 'created_at', 'updated_at']);

        $chat = collect($chat);
        $chat['messages'] = array_reverse($chat['messages']);
        
        return $chat ? $chat : json_decode(['error' => 'Chat not found!']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMessage(Request $request, $chat_id)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $newMessage = Chat::find($chat_id)->messages()->create([
            'user_id' => $user->id,
            "message" => $request->get('message'),
            'word_count' => substr_count($request->get("message"), " ") + 1
            ]);
        //return $newMessage->user->only('name');
        event(new MessageSent($user, $newMessage));
            
        return json_encode(["message" => "success"]);
    }

    public function initializeConnection(Request $request, $chat_id) {
        broadcast(new InitChat(
            $request->get("initiator_id"), 
            $request->get("target_id"), 
            $chat_id
            ))->toOthers();
        return $this->getChatWithMessages(null, $chat_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
