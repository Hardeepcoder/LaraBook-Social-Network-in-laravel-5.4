<?php

Route::get('/messages', function(){
  return view('messages');
});

Route::get('/getMessages', function(){
  $allUsers = DB::table('users')->where('id', '!=', Auth::user()->id)->get();
  return $allUsers;
});


Route::get('/', function () {
  $posts = DB::table('users')
  ->leftJoin('profiles', 'profiles.user_id','users.id')
  ->leftJoin('posts',  'posts.user_id' , 'users.id')
  ->orderBy('posts.created_at', 'desc')->take(2)
  ->get();
    return view('welcome', compact('posts'));
});

Route::get('/posts', function () {
  $posts_json = DB::table('users')
  ->leftJoin('profiles', 'profiles.user_id','users.id')
  ->leftJoin('posts',  'posts.user_id' , 'users.id')
  ->orderBy('posts.created_at', 'desc')->take(2)
  ->get();
    return $posts_json;
});

Route::post('addPost', 'PostsController@addPost');

Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index');
    Route::get('/profile', 'HomeController@index');


    Route::get('/profile/{slug}', 'ProfileController@index');

    Route::get('/changePhoto', function() {

        return view('profile.pic');
    });

    Route::post('/uploadPhoto', 'ProfileController@uploadPhoto');


    Route::get('editProfile', 'ProfileController@editProfileForm');

    Route::post('/updateProfile', 'ProfileController@updateProfile');

    Route::get('/findFriends', 'ProfileController@findFriends');

    Route::get('/addFriend/{id}', 'ProfileController@sendRequest');


    Route::get('/requests', 'ProfileController@requests');

    Route::get('/accept/{name}/{id}', 'ProfileController@accept');

    Route::get('friends', 'ProfileController@friends');

    Route::get('requestRemove/{id}', 'ProfileController@requestRemove');

    Route::get('/notifications/{id}', 'ProfileController@notifications');

    Route::get('/unfriend/{id}', function($id){

                $loggedUser = Auth::user()->id;

              DB::table('friendships')
              ->where('requester', $loggedUser)
              ->where('user_requested', $id)
              ->delete();


              return back()->with('msg', 'You are not friend with this person');
        });

});


Route::get('/logout', 'Auth\LoginController@logout');
