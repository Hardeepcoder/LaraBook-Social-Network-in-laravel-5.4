@extends('profile.master')

@section('content')

<div class="container">
    
     <ol class="breadcrumb">
        <li><a href="{{url('/home')}}">Home</a></li>
        <li><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
         <li><a href="{{url('/editProfile')}}">Edit Profile</a></li>
        <li><a href="">Change Image</a></li>
    </ol>
    
    
    <div class="row">
        
     @include('profile.sidebar')
            
        
        
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::user()->name}}</div>

                <div class="panel-body">
                    
                    <div class="col-md-4">
                        Welcome to your profile
                        
                        <img src="{{url('../')}}/public/img/{{Auth::user()->pic}}" width="100px" height="100px"/><br>
                        <br>
                        <hr>
                        
                        
                        <form action="{{url('/')}}/uploadPhoto" method="post" enctype="multipart/form-data">
                            
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="file" name="pic" class="form-control"/>
                            
                            <input type="submit" class="btn btn-success" name="btn"/>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
