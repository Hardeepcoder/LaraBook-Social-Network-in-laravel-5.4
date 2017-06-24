<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class companyController extends Controller
{
    public function index(){
      return view('company.index');
    }

    public function addJobSubmit(Request $r){
       $skills = implode($r->skills,',');
       $contact_email = $r->contact_email;
       $job_title = $r->job_title;
       $requirements = $r->requirements;
       $com_id = Auth::user()->id;
       $add_job = DB::table('jobs')->insert([
         'skills' => $skills,
         'contact_email' => $contact_email,
         'job_title' => $job_title,
         'requirements' => $requirements,
         'company_id' => $com_id,
       ]);
       if($add_job){
         $jobs = DB::table('jobs')->where('company_id', Auth::user()->id)
         ->get();
         return view('company.jobs', compact('jobs'));
       }

    }

    public function viewJobs(){
      $jobs = DB::table('jobs')->where('company_id', Auth::user()->id)
      ->get();
      return view('company.jobs', compact('jobs'));
    }



}
