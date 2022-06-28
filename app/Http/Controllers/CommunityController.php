<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Community;
use App\User;
use App\Services\FileManager;
Use Illuminate\Support\Facades\Storage;
use JWTAuth;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = ['state' => 1, 'followed_communities' => null];
        $user = JWTAuth::parseToken()->authenticate();
        $communities = $user->followed_communities;
        $communities->load('posts');
        $response['followed_communities'] = $communities;
        return json_encode($response);
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
    public function store(Request $request)
    {
        $response = ['state' => 0, 'id' => null];
        
        $user = JWTAuth::parseToken()->authenticate();
        $fileManager = new FileManager();
        try {
            $community = $user->communities()->create($request->except('file'));
            if($request->hasFile('file')) {
                $fileNameUploaded = $fileManager->uploadImage($request->file('file'), "nullable", Community::$coverPath);
                if($fileNameUploaded != null) {
                    $community->cover = $fileNameUploaded;
                    $community->save();
                }
            }
        } catch (\Throwable $th) {
            return json_encode($response);
        }
        
        if($community) {
            $response['state'] = 1;
            $response['id'] = $community->id;
        }
        return json_encode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Community $community)
    {
        $community = $community->load('posts');
        $community['related_communities'] = $community->get_related_communities();
        $response = ['state' => 1, 'community' => $community];
        return $response;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Community $community)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        $response = ['state' => 0];
        $user = JWTAuth::parseToken()->authenticate();
        if($user->id == $community->owner_id)
            Storage::delete(Community::$coverPath. $community->cover);
            $response['state'] = $community->delete();
        return json_encode($response);
    }

    public function follow(Community $community) {
        $response = ['state' => 1, 'community' => null, 'followers' => $community->followers];
        $user = JWTAuth::parseToken()->authenticate();
        $record = $user->followed_communities()->attach($community);
        $response['community'] = $community;
        $response['followers'] += 1;
        return json_encode($response);
    }

    public function unfollow(Community $community) {
        $response = ['state' => 0, 'followers' => $community->followers];
        $user = JWTAuth::parseToken()->authenticate();
        $response['state'] = $user->followed_communities()->detach($community);
        if($response['state'])
            $response['followers'] -= 1;
        return json_encode($response);
    }


}
