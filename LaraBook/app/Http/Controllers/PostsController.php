<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function index(){

      $posts = DB::table('posts')->get();

      return view('posts',compact('posts'));
    }
}
