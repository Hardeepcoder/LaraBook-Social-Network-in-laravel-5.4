<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\friendships;
use App\notifcations;
use App\User;
class ProfileController extends Controller {

    public function index($slug) {

     $userData = DB::table('users')
     ->leftJoin('profiles', 'profiles.user_id','users.id')
     ->where('slug', $slug)
     ->get();

        return view('profile.index', compact('userData'))->with('data', Auth::user()->profile);
    }

    public function uploadPhoto(Request $request) {

        $file = $request->file('pic');
        $filename = $file->getClientOriginalName();

        $path = 'public/img';

        $file->move($path, $filename);
        $user_id = Auth::user()->id;

        DB::table('users')->where('id', $user_id)->update(['pic' => $filename]);
        //return view('profile.index');
        return back();
    }

    public function setToken(Request $request){
     $email = $request->email_address;
     //check any user have this email address
     $checkEmail = DB::table('users')->where('email',$email)->get();
     if(count($checkEmail)==0){
       echo "wrong email address";
     }else{
       $randomNumber = rand(1,500);
         $token_sl = bcrypt($randomNumber);
         $token = stripslashes($token_sl);

         $insert_token = DB::table('password_resets')->insert(['email' =>$email, 'token'=>$token,
       'created_at'=>\Carbon\Carbon::now()->toDateTimeString()]);

       //echo "send reset link to this email address";
       $baseUrl = 'http://hardeepcoder.com/laravel/larabook/getToken/'.$token;
        $to = $email;
        $subject = "Password reset Link";
        $message = "<a href='$baseUrl'>$token</a>";
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <admin@larabook.com>' . "\r\n";

        mail($to,$subject,$message,$headers);

     }

    }

    public function setPass(Request $request){
      $email = $request->email;
      $pass = $request->pass;
      $cpass = $request->confrim_pass;
      if($pass == $cpass){
        //update the pass for this user
      DB::table('users')->where('email',$email)->update(['password' =>bcrypt($pass)]);
      return back();
      }
      else{
        echo "passwords not matched";
      }

    }

    public function editProfileForm() {
        return view('profile.editProfile')->with('data', Auth::user()->profile);
    }

    public function updateProfile(Request $request) {

        $user_id = Auth::user()->id;

        DB::table('profiles')->where('user_id', $user_id)->update($request->except('_token'));
        return back();
    }

    public function findFriends() {

        $uid = Auth::user()->id;
        $allUsers = DB::table('profiles')
        ->leftJoin('users', 'users.id', '=', 'profiles.user_id')
        ->where('users.id', '!=', $uid)->get();

        return view('profile.findFriends', compact('allUsers'));
    }

    public function sendRequest($id) {

        Auth::user()->addFriend($id);

        return back();
    }

    public function requests() {
        $uid = Auth::user()->id;

        $FriendRequests = DB::table('friendships')
                        ->rightJoin('users', 'users.id', '=', 'friendships.requester')
                        ->where('status', '=', Null)
                        ->where('friendships.user_requested', '=', $uid)->get();


        return view('profile.requests', compact('FriendRequests'));
    }

    public function accept($name, $id) {

        $uid = Auth::user()->id;
        $checkRequest = friendships::where('requester', $id)
                ->where('user_requested', $uid)
                ->first();
        if ($checkRequest) {
            // echo "yes, update here";

            $updateFriendship = DB::table('friendships')
                    ->where('user_requested', $uid)
                    ->where('requester', $id)
                    ->update(['status' => 1]);

            $notifcations = new notifcations;
            $notifcations->note = 'accepted your friend request';
            $notifcations->user_hero = $id; // who is accepting my request
            $notifcations->user_logged = Auth::user()->id; // me
            $notifcations->status = '1'; // unread notifications
            $notifcations->save();


            if ($notifcations) {

                return back()->with('msg', 'You are now Friend with ' . $name);
            }
        } else {
            return back()->with('msg', 'You are now Friend with this user');
        }
    }

    public function friends() {
        $uid = Auth::user()->id;

        $friends1 = DB::table('friendships')
                ->leftJoin('users', 'users.id', 'friendships.user_requested') // who is not loggedin but send request to
                ->where('status', 1)
                ->where('requester', $uid) // who is loggedin
                ->get();

        //dd($friends1);

        $friends2 = DB::table('friendships')
                ->leftJoin('users', 'users.id', 'friendships.requester')
                ->where('status', 1)
                ->where('user_requested', $uid)
                ->get();

        $friends = array_merge($friends1->toArray(), $friends2->toArray());

        return view('profile.friends', compact('friends'));
    }

    public function requestRemove($id) {

        DB::table('friendships')
                ->where('user_requested', Auth::user()->id)
                ->where('requester', $id)
                ->delete();

        return back()->with('msg', 'Request has been deleted');
    }

    public function notifications($id) {

         $uid = Auth::user()->id;
        $notes = DB::table('notifcations')
                ->leftJoin('users', 'users.id', 'notifcations.user_logged')
                ->where('notifcations.id', $id)
                ->where('user_hero', $uid)
                ->orderBy('notifcations.created_at', 'desc')
                ->get();

        $updateNoti = DB::table('notifcations')
                     ->where('notifcations.id', $id)
                    ->update(['status' => 0]);

       return view('profile.notifcations', compact('notes'));
    }

    public  function sendMessage(Request $request){
      $conID = $request->conID;
      $msg = $request->msg;

      $checkUserId = DB::table('messages')->where('conversation_id', $conID)->get();
      if($checkUserId[0]->user_from== Auth::user()->id){
        // fetch user_to
        $fetch_userTo = DB::table('messages')->where('conversation_id', $conID)
        ->get();
          $userTo = $fetch_userTo[0]->user_to;
      }else{
      // fetch user_to
      $fetch_userTo = DB::table('messages')->where('conversation_id', $conID)
      ->get();
        $userTo = $fetch_userTo[0]->user_to;
      }

        // now send message
        $sendM = DB::table('messages')->insert([
          'user_to' => $userTo,
          'user_from' => Auth::user()->id,
          'msg' => $msg,
          'status' => 1,
          'conversation_id' => $conID
        ]);
        if($sendM){
          $userMsg = DB::table('messages')
          ->join('users', 'users.id','messages.user_from')
          ->where('messages.conversation_id', $conID)->get();
          return $userMsg;
        }
    }

    public function newMessage(){
      $uid = Auth::user()->id;

      $friends1 = DB::table('friendships')
              ->leftJoin('users', 'users.id', 'friendships.user_requested') // who is not loggedin but send request to
              ->where('status', 1)
              ->where('requester', $uid) // who is loggedin
              ->get();

      $friends2 = DB::table('friendships')
              ->leftJoin('users', 'users.id', 'friendships.requester')
              ->where('status', 1)
              ->where('user_requested', $uid)
              ->get();

      $friends = array_merge($friends1->toArray(), $friends2->toArray());
      return view('newMessage', compact('friends', $friends));
    }

    public function sendNewMessage(Request $request){
        $msg = $request->msg;
        $friend_id = $request->friend_id;
        $myID = Auth::user()->id;

        //check if conversation already started or not
        $checkCon1 = DB::table('conversation')->where('user_one',$myID)
        ->where('user_two',$friend_id)->get(); // if loggedin user started conversation

        $checkCon2 = DB::table('conversation')->where('user_two',$myID)
        ->where('user_one',$friend_id)->get(); // if loggedin recviced message first

        $allCons = array_merge($checkCon1->toArray(),$checkCon2->toArray());

        if(count($allCons)!=0){
          // old conversation
          $conID_old = $allCons[0]->id;
          //insert data into messages table
          $MsgSent = DB::table('messages')->insert([
            'user_from' => $myID,
            'user_to' => $friend_id,
            'msg' => $msg,
            'conversation_id' =>  $conID_old,
            'status' => 1
          ]);
        }else {
          // new conversation
          $conID_new = DB::table('conversation')->insertGetId([
            'user_one' => $myID,
            'user_two' => $friend_id
          ]);
          echo $conID_new;

          $MsgSent = DB::table('messages')->insert([
            'user_from' => $myID,
            'user_to' => $friend_id,
            'msg' => $msg,
            'conversation_id' =>  $conID_new,
            'status' => 1
          ]);

        }
    }

    public function jobs(){
      $jobs = DB::table('users')
      ->Join('jobs','users.id','jobs.company_id')
      ->get();
      return view('profile.jobs', compact('jobs'));
    }

    public function job($id){
      $jobs = DB::table('users')
      ->leftJoin('jobs','users.id','jobs.company_id')
      ->where('jobs.id',$id)
      ->get();
      return view('profile.job', compact('jobs'));
    }
}
