@extends('profile.master')

@section('content')

<div class="container">

    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}">Home</a></li>
        <li><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
        <li><a href="">Edit Profile</a></li>
    </ol>


    <div class="row">
        @include('profile.sidebar')


        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::user()->name}}</div>

                <div class="panel-body">
                    <div class="col-sm-12 col-md-12">
                        <div class="thumbnail">
                            <h3 align="center">{{ucwords(Auth::user()->name)}}</h3>
                            <img src="{{url('../')}}/public/img/{{Auth::user()->pic}}" width="120px" height="120px" class="img-circle"/>
                            <div class="caption">

                                <p align="center">{{$data->city}} - {{$data->country}}</p>
                                <p align="center">  <a href="{{url('/')}}/changePhoto"  class="btn btn-primary" role="button">Change Image</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12">


                        <form action="{{url('/updateProfile')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <div class="col-md-6">

                                <div class="input-group">
                                    <span  id="basic-addon1">City Name</span>
                                    <input type="text" class="form-control" placeholder="City Name" name="city" value="{{$data->city}}">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span  id="basic-addon1">Country Name</span>
                                    <input type="text" class="form-control" placeholder="Country Name" name="country" value="{{$data->country}}">
                                </div>


                            </div>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span  id="basic-addon1">About</span>
                                    <textarea type="text" class="form-control" name="about">{{$data->about}}</textarea>
                                </div>

                                <br>

                                <div class="input-group">

                                    <input type="submit" class="btn btn-success pull-right" >
                                </div>
                            </div>

                        </form>






                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
