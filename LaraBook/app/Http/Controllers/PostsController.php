<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\post;
use App\comments;
use App\user;
use DB;
class PostsController extends Controller
{

    public function index(){
      $posts = DB::table('posts')->get();
      return view('posts',compact('posts'));
    }

    public function search(Request $request){
      $qry = $request->qry;
      if($qry!=""){
      return  $users= DB::table('users')
      ->where('name', 'like', '%'. $qry . '%')
      ->get();
    }
    }

    public function addPost(Request $request){
       $content = $request->content;
       $createPost = DB::table('posts')
       ->insert(['content' =>$content, 'user_id' => Auth::user()->id,
        'status' =>0, 'created_at' =>\Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString() ]);

      if($createPost){
        return post::with('user','likes','comments')
        ->orderBy('created_at','DESC')->get();
      }

    }

    public function deletePost($id){
      $deletePost = DB::table('posts')->where('id',$id)->delete();
      if($deletePost){
        return post::with('user','likes','comments')
        ->orderBy('created_at','DESC')->get();
      }
    }

    public function updatePost($id, Request $request){
      $updatePost = DB::table('posts')->where('id',$id)->update([
        'content' => $request->updatedContent,
      ]);
      if($updatePost){
        return post::with('user','likes','comments')
        ->orderBy('created_at','DESC')->get();
      }
    }

    public function likePost($id){
      $likePost = DB::table('likes')->insert([
        'posts_id' => $id,
        'user_id' => Auth::user()->id,
        'created_at' =>\Carbon\Carbon::now()->toDateTimeString()
      ]);
      // if like successfully then display posts
      if($likePost){
        return post::with('user','likes','comments')->orderBy('created_at','DESC')->get();
      }
    }

	public function addComment(Request $request){
		$comment = $request->comment;
		$id = $request->id;

       $createComment= DB::table('comments')
       ->insert(['comment' =>$comment, 'user_id' => Auth::user()->id, 'posts_id' => $id,
         'created_at' =>\Carbon\Carbon::now()->toDateTimeString()]);

      if($createComment){
        return post::with('user','likes','comments')->orderBy('created_at','DESC')->get();
		// return all posts same as before
      }
  }


  public function saveImg(Request $request){
      $img = $request->get('image');

      // remove extra parts
      $exploded = explode(",",$img);

     // extention
     if(str_contains($exploded[0], 'gif')){
       $ext = 'gif';
     }else if(str_contains($exploded[0], 'png')){
       $ext = 'png';
     }else{
       $ext = 'jpg';
     }

     // decode
     $decode = base64_decode($exploded[1]);

     $filename = str_random() . "." . $ext;

     //path of your local folder
     $path = public_path() . "/img/" . $filename;

     //upload image to your path

     if(file_put_contents($path,$decode)){
      // echo "file uploaded" . $filename;
      $content = $request->content;
      $createPost = DB::table('posts')
      ->insert(['content' =>$content, 'user_id' => Auth::user()->id,'image' => $filename,
       'status' =>0, 'created_at' =>\Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString() ]);

     if($createPost){
       return post::with('user','likes','comments')->orderBy('created_at','DESC')->get();
     }

     }


  }





}
