<?php

Route::post('/sendMessage', 'ProfileController@sendMessage');

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

              DB::table('friendships')
              ->where('user_requested', $loggedUser)
              ->where('requester', $id)
              ->delete();


              return back()->with('msg', 'You are not friend with this person');
        });

        //forgot password
        Route::get('forgotPassword',function(){
          return view('profile.forgotPassword');
        });

        Route::post('setToken','ProfileController@setToken');
        //get random token by email
        Route::get('/getToken/{token}',function($token){
        // token is right or wrong
        if(isset($token) && $token!=""){
         $getData = DB::table('password_resets')->where('token',$token)->get();
         if(count($getData)!=0){
           return view('profile.setPassword')->with('data',$getData);

         }else{
           echo "token is wrong";
         }
        }else{
          echo "token not found";
        }
        });


        //set/update new password
        Route::get('setPass','ProfileController@setPass');
        //messenger start
        Route::get('/messages', function(){
          return view('messages');
        });

        // messenger start
        Route::get('/getMessages', function(){
          $allUsers1 = DB::table('users')
          ->Join('conversation','users.id','conversation.user_one')
          ->where('conversation.user_two', Auth::user()->id)->get();
          //return $allUsers1;

          $allUsers2 = DB::table('users')
          ->Join('conversation','users.id','conversation.user_two')
          ->where('conversation.user_one', Auth::user()->id)->get();

          return array_merge($allUsers1->toArray(), $allUsers2->toArray());
        });

        Route::get('/getMessages/{id}', function($id){

          $userMsg = DB::table('messages')
          ->join('users', 'users.id','messages.user_from')
          ->where('messages.conversation_id', $id)->get();
          return $userMsg;

        });

});


Route::get('/logout', 'Auth\LoginController@logout');
