@extends('profile.master')

@section('content')

<div class="container">

    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}">Home</a></li>
        <li><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
        <li><a href="">Jobs</a></li>
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
                    <div class="col-sm-12 col-md-12">
                         @if ( session()->has('msg') )
                         <p class="alert alert-success">
                                      {{ session()->get('msg') }}
                                   </p>
                                @endif
                        @foreach($jobs as $job)


                          <div class="col-md-12 myJobs">
                          <a href="{{url('job')}}/{{$job->id}}">
                            <div class="thumbnail">
                                <div class="caption">
                                  <p>
                                    <b>Job Title:</b> {{$job->job_title}}<br>
                                    <b>Eamil:</b> {{$job->contact_email}}<br>
                                  <b>skills:</b> {{$job->skills}}<br>
                                  <b>requirements</b>{{$job->requirements}}</br>
                                  <b>company</b>{{$job->company_id}}
                                  </p>

                                </div>
                            </div>
                            </a>
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
