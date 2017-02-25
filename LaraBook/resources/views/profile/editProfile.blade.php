@extends('profile.master')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::user()->name}}</div>

                <div class="panel-body">
                    <div class="col-md-4">
                        Edit your profile
                        
                        <img src="{{url('../')}}/public/img/{{Auth::user()->pic}}" width="80px" height="80px"/>
                        <a href="{{url('/')}}/changePhoto" >Change Image</a>
                        
                        
                        
                        <input type="text" name="city" value="{{Auth::user()->city}}"/>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
