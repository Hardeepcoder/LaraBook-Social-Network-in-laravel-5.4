@extends('profile.master')

@section('content')

<div class="container">

    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}">Home</a></li>
        <li><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
        <li><a href="{{url('/jobs')}}">Jobs</a></li>
        <li>{{$jobs[0]->job_title}}</li>
    </ol>


    <div class="row">
        @include('profile.sidebar')


        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::user()->name}}, may you interested in these Jobs
                  <br>
                  <a href="{{url('jobs')}}">All jobs</a>
                </div>

                <div class="panel-body">
                    <div class="col-sm-12 col-md-12 jobDetails">
                         @if ( session()->has('msg') )
                         <p class="alert alert-success">
                                      {{ session()->get('msg') }}
                                   </p>
                                @endif
                        @foreach($jobs as $job)
                    <h4 >
                      <b>{{ucwords($job->name)}}</b> need <b>{{$job->job_title}}</b>
                    </h4>

                    <div class="row job_company">

                      <div class="col-md-2 pull-left">
                      <img src="{{Config::get('app.url')}}/public/img/{{$job->pic}}" class="img-rounded" style="width:100px; height:100px; margin:5px; border:1px solid #ddd; padding:5px">
                      </div>

                      <div class="col-md-10 pull-left">
                        <h3 style="font-size:18px; color:green">
                          {{ucwords($job->name)}}</h3>
                        <small>{{$job->email}}</small>
                      </div>

                    </div>

                        <div class="col-md-12" >
                          <h3 class="job_point">
                          Requirements: </h3>
                          <p>{{$job->requirements}}</p>
                        </div>

                        <div class="col-md-12" >
                          <h3 class="job_point">
                          Skills: </h3>
                          <p>{{$job->skills}}</p>
                        </div>

                        <div class="col-md-12" >
                          <h3 class="job_point">
                          How to Apply: </h3>
                          <p>Please send your awesome CV and PortFolio to email:
                          <a href="mailto:{{$job->contact_email}}" class="email_link">{{$job->contact_email}}</a></p>
                        </div>


                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
