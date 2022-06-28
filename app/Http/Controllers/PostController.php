<?php

namespace App\Http\Controllers;

use App\Post;
use App\Events\{PostCreated, PostLiked};
use App\Services\FileManager;
use JWTAuth;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{


    /*
    protected $allowedTags = ['<b>', '<u>', '<p>', '<h1>', '<h2>', '<h3>', '<h4>', '<h5>', '<h6>', '<br>', '<div>', '<img>', '<ul>', '<ol>', '<li>'];

    function strip_tags_content($text, $tags = '', $invert = FALSE) {

        preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags);
        $tags = array_unique($tags[1]);
        
        if(is_array($tags) AND count($tags) > 0) {
            if($invert == FALSE) {
            return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text);
            }
            else {
            return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text);
            }
        }
        elseif($invert == FALSE) {
            return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);
        }
        return $text;
    }
    */


    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function show(Post $post) {
        $response = ['state' => 1, 'post' => $post->load('comments')->loadSocialDetails()];
        return json_encode($response);
    }

    public function store(Request $request)
    {
        // Initialize data
        $user = \JWTAuth::parseToken()->authenticate();
        $response = ['state' => 0, 'post' => null];
        $fileManager = new FileManager();
        // Try to create post && upload image if exist
        try {
            $post = $user->posts()->create($request->except('file'));
            if($request->hasFile('file')) {
                $fileNameUploaded = $fileManager->uploadImage($request->file('file'), "nullable", Post::$postImagePath);
                // return $fileNameUploaded;
                if($fileNameUploaded != null) {
                    $post->image = $fileNameUploaded;
                    $post->save();
                }
            }
            // Fire event
            event(new PostCreated($post));

            // Modify response;
            $response['state'] = 1;
            $post->user = $user->minimizeAttributes(); // we need minimum attributes of user
            $post['current_user_liked'] = $post->currentUserLiked($user->id); // the default standard
            $response['post'] = $post->loadSocialDetails(); // likes_count, comments and shares

        } catch (\Throwable $th) {
            // Something went wrong
            $response['message'] = $th->getMessage();
            return json_encode($response);
        }
        return json_encode($response);
    }



    public function like(Post $post) {
        $response = ['state' => 0, 'likes_count' => $post->likes_count];
        $user = JWTAuth::parseToken()->authenticate();

        // If already liked, then unlike the post
        $already_liked = $post->likes->where('user_id', $user->id)->count() > 0;
        if($already_liked) {
            return $this->unlike($post);
        }
        // Create 'like' record && increment likes count if success
        $response['state'] = (int) ($post->likes()->create(['user_id' => $user->id]) != null);
        $response['state'] ? $response['likes_count']++ : null;
        
        // If the user who liked the post is not the post's author, then notify post's author
        $user->id != $post->user->id ? event(new PostLiked($user, $post)) : null;

        return json_encode($response);
    }

    public function unlike(Post $post) {
        $response = ['state' => 0, 'likes_count' => $post->likes_count];
        $user = JWTAuth::parseToken()->authenticate();

        // remove 'like' record && decrement likes count if success
        $response['state'] = $post->likes()->where('user_id', $user->id)->delete();
        $response['state'] ? $response['likes_count']-- : null;

        return json_encode($response);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Initialize data
        $user = \JWTAuth::parseToken()->authenticate();
        $response = ['state' => 0, 'post' => null];
        $fileManager = new FileManager();
        // Try to create post && upload image if exist
        try {
            $post = $user->posts()->update($request->all());
            if($request->hasFile('file')) {
                $fileNameUploaded = $fileManager->uploadImage($request->file('file'), "nullable", Post::$postImagePath);
                $post->image = $fileNameUploaded;
                $post->save();
            }
            // Fire event
            event(new PostCreated($post));
            $response['post'] = $post;
        } catch (\Throwable $th) {
            // Something went wrong
            $response['state'] = 1;
            throw $th;
        }
        return json_encode($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $response = ['state' => 0];
        $user = JWTAuth::parseToken()->authenticate();

        // Check user-post authority
        if($user->id == $post->user->id) {
            $post->delete();
            Storage::delete(Post::$postImagePath. $post->image);
            $response['state'] = 1;
        }
        
        return json_encode($response);
        
    }
}
