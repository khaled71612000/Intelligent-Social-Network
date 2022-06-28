<?php

namespace App\Http\Controllers;

use App\{Post, Comment};
use Illuminate\Http\Request;
use JWTAuth;
use App\Events\CommentCreated;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, Post $post)
    {
        // Initialize data
        $response = ['state' => 0, 'comment' => null, 'comments_count' => $post->comments_count];
        $user = JWTAuth::parseToken()->authenticate();

        // Create comment
        $comment = $post->comments()->create([
            'user_id' => $user->id,
            'body' => $request->input('body'),
        ]);
        
        // If created, fire event to post's author && append more details to the comment && update response
        if($comment) {
            event(new CommentCreated($user, $post, $comment));
            $comment = $comment->loadCount(['upvotes', 'downvotes'])->load(['user']);
            $response['state'] = 1;
            $response['comment'] = $comment;
            $response['comments_count'] = $post->comments_count + 1;
        }
        return json_encode($response);
    }


    public function upvote(Comment $comment) {
        $user = JWTAuth::parseToken()->authenticate();
        $user_previous_vote = $comment->currentUserVote($user->id);

        $response = ['state' => 0, 
        'upvotes_count' => $comment->upvotes_count, 
        'downvotes_count' => $comment->downvotes_count, 
        'current_user_vote' => $user_previous_vote
        ];
        
        // Handle vote after checking previous vote
        // User clicked upvote, he had downvoted previously
        if($user_previous_vote === 0) {
            $vote = $comment->votes()->where('user_id', $user->id)->update(['vote' => 1]);
            $response['downvotes_count']--;
            $response['upvotes_count']++;
            $response['current_user_vote'] = 1;
        }
        // User clicked upvote, he already upvoted before
        else if ($user_previous_vote === 1) {
            $vote = $comment->votes()->where('user_id', $user->id)->delete();
            $response['upvotes_count']--;
            $response['current_user_vote'] = null;
        }
        // User has no votes for this comment yet
        else {
            $vote = $comment->votes()->create([
                'user_id' => $user->id,
                'vote' => 1,
            ]);
            $response['upvotes_count']++;
            $response['current_user_vote'] = 1;
        }
        $response['state'] = 1;
        return json_encode($response);
    }

    public function downvote(Comment $comment) {
        $user = JWTAuth::parseToken()->authenticate();
        $user_previous_vote = $comment->currentUserVote($user->id);

        $response = ['state' => 0, 
        'upvotes_count' => $comment->upvotes_count, 
        'downvotes_count' => $comment->downvotes_count, 
        'current_user_vote' => $user_previous_vote
        ];

        // Handle vote after checking previous vote
        // User clicked downvote, he already downvoted previously
        if ($user_previous_vote === 0) {
            $vote = $comment->votes()->where('user_id', $user->id)->delete();
            $response['downvotes_count']--;
            $response['current_user_vote'] = null;
        }
        // User clicked downvote, he had upvoted previously
        else if ($user_previous_vote === 1) {
            $vote = $comment->votes()->where('user_id', $user->id)->update(['vote' => 0]);
            $response['downvotes_count']++;
            $response['upvotes_count']--;
            $response['current_user_vote'] = 0;
        }
        // User has no previous votes for this comment
        else {
            $vote = $comment->votes()->create([
                'user_id' => $user->id,
                'vote' => 0,
            ]);
            $response['downvotes_count']++;
            $response['current_user_vote'] = 0;
        }
        $response['state'] = 1;
        return json_encode($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $response = ['state' => 0, 'comment' => null];
        $user = JWTAuth::parseToken()->authenticate();

        // Create comment
        $response['state'] = $comment->update($request->all());
        if($response['state'])
            $response['comment'] = $comment;
        return json_encode($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $response = ['state' => 0, 'comments_count' => $comment->post->comments_count];
        $user = JWTAuth::parseToken()->authenticate();
        if($user->id == $comment->user->id) {
            $response['state'] = $comment->delete();
            $response['state'] ? $response['comments_count']-- : null;
        }
        return json_encode($response);
    }
}
