<?php

Route::post('search', 'PostsController@search');
Route::get('try',function(){
	return App\post::with('user','likes','comments')->get();
});
Route::get('newMessage','ProfileController@newMessage');
Route::post('sendNewMessage', 'ProfileController@sendNewMessage');
Route::post('/sendMessage', 'ProfileController@sendMessage');

Route::get('/', function () {
  $posts = App\post::with('user','likes','comments')
	->orderBy('created_at','DESC')
	->get();
  return view('welcome', compact('posts'));
  });

Route::get('/posts', function () {
      return App\post::with('user','likes','comments')
			->orderBy('created_at','DESC')
			->get();
});

Route::get('posts/{id}', function($id){
	 $pData = App\post::where('id',$id)->get();
	 echo $pData[0]->content;
});

Route::post('updatePost/{id}', 'PostsController@updatePost');

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
         }else{echo "token is wrong";}
        }else{echo "token not found";}
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
					//update cov status
					$update_status = DB::table('conversation')->where('id',$id)
					->update([
						'status' => 0 // now read by user
					]);

          $userMsg = DB::table('messages')
          ->join('users', 'users.id','messages.user_from')
          ->where('messages.conversation_id', $id)->get();
          return $userMsg;
        });

        //jobs for users
        Route::get('jobs', 'ProfileController@jobs');
        Route::get('job/{id}','ProfileController@job');
        // delete post
        Route::get('/deletePost/{id}','PostsController@deletePost');
        //like post
        Route::get('/likePost/{id}','PostsController@likePost');
		//add comments
    Route::post('addComment', 'PostsController@addComment');

    //save image
    Route::post('saveImg', 'PostsController@saveImg');

});
Route::group(['prefix' => 'company', 'middleware' => ['auth', 'company']], function () {
 Route::get('/','companyController@index');

 Route::get('/addJob', function(){
   return view('company.addJob');
 });

 Route::get('/jobs','companyController@viewJobs');
 Route::post('addJobSubmit', 'companyController@addJobSubmit');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
 Route::get('/','adminController@index');
});
Route::get('/logout', 'Auth\LoginController@logout');
