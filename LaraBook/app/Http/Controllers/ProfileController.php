<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index($slug){
       
        return view('profile.index');
    }
    
    
    public function  uploadPhoto(Request $request){
        
       $file = $request->file('pic');
       $filename = $file->getClientOriginalName();  
       
       $path = 'public/img';
       
       $file->move($path, $filename);
       $user_id = Auth::user()->id;
       
       DB::table('users')->where('id', $user_id)->update(['pic' => $filename]);
       //return view('profile.index');
     return back();
        
    }
    
  
}
