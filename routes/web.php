<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Client\Pool;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Http;


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chat/{id}', 'ChatController@getChatWithMessages')->name('chatWithMessages');
Route::post('/chat/{chat_id}/init', 'ChatController@initializeConnection')->name('chat_initializer');
Route::post('/chat/{chat_id}/message', 'ChatController@storeMessage')->name('chat_store_message');



Route::get('/ins/1', 'PersonalityController@index');

// Users
Route::get('/user/{user}', "UserController@show");
Route::get("/api/user/{user}/notifications", "UserController@getNotifications");

// Home
Route::get('/api/home', "CommunityController@index");


// Relationships
Route::get('/relationships/addFriend/{receiver}/', "RelationshipController@addFriend");
Route::get('/relationships/acceptFriend/{sender}/', "RelationshipController@acceptFriend");
Route::get('/relationships/cancelFriendRequest/{receiver}/', "RelationshipController@cancelFriendRequest");
Route::get('/relationships/unfriend/{friend}/', "RelationshipController@unfriend");
Route::get('/relationships/emotify/{friend}/', "RelationshipController@emotify");
Route::get('/relationships/unemotify/{friend}/', "RelationshipController@unemotify");

// Posts
Route::post('/api/post/', "PostController@store");
Route::get('/api/post/{post}', "PostController@show");
Route::put('/api/post/{post}', "PostController@update");
Route::post('/api/post/{post}/delete', "PostController@destroy");
// Likes
Route::get('/api/post/{post}/like', "PostController@like");
Route::get('/api/post/{post}/unlike', "PostController@unlike");
// Comments
Route::post('/api/post/{post}/comment', "CommentController@store");
Route::put('/api/comment/{comment}', "CommentController@update");
Route::post('/api/comment/{comment}/delete', "CommentController@destroy");
Route::get('/api/comment/{comment}/upvote', "CommentController@upvote");
Route::get('/api/comment/{comment}/downvote', "CommentController@downvote");


// Community
Route::post('/api/community', "CommunityController@store");
Route::get('/api/community/{community}', "CommunityController@show");
Route::put('/api/community/{community}', "CommunityController@update");
Route::post('/api/community/{community}/delete', "CommunityController@destroy");
Route::get('/api/community/{community}/follow', "CommunityController@follow");
Route::get('/api/community/{community}/unfollow', "CommunityController@unfollow");


// Insights
Route::get('/api/insights/personality/{personality:type}', "PersonalityController@show");
Route::get('/api/insights/learning/{learning_style:type}', "VAKController@getInsights");
Route::get('/api/insights/relationship/{personality1_id}/{personality2_id}', "RelationshipController@getInsights");


Route::get('/__emotion__/__reset__', 'EmotionController@reset');
Route::get("/__AnalyzeBatches__/", "ScheduleController@analyzeBatches");

Route::get('{vue_capture?}', function () {

    return view('welcome');
   })->where('vue_capture', '[\/\w\.-]*');



/*

RelationshipController@initiate, update, terminate
@ChatController@create, initiate, 
@MessagesController@create, read
@CommentController@create, upvote, downvote, delete
@Community@create, update, delete, join/follow leave/unfollow, 
@PersonalityController@show, personalitiesYouMayLike
@PostController@create, update, delete, gather, like, unlike, share
@PrivacyController@update
@UserController@update
@ScheduleController@analyzeDaily, analyzeWeekly

Notifications
*/