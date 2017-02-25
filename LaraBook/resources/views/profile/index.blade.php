@extends('profile.master')

@section('content')



<div class="container">

    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}">Home</a></li>
        <li><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>

    </ol>

    <div class="row">
        
       @include('profile.sidebar')
            
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::user()->name}}</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <h3 align="center">{{ucwords(Auth::user()->name)}}</h3>
                                <img src="{{url('../')}}/public/img/{{Auth::user()->pic}}" width="120px" height="120px" class="img-circle"/>
                                <div class="caption">

                                    <p align="center">{{$data->city}} - {{$data->country}}</p>
                                    <p align="center"><a href="{{url('/editProfile')}}" class="btn btn-primary" role="button">Edit Profile</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <h4 class=""><span class="label label-default">About</span></h4>
                            <p> {{$data->about}}</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
