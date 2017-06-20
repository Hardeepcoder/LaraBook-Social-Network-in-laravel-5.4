@extends('profile.master')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}">Home</a></li>


    </ol>

    <div class="row">

         @include('profile.sidebar')


        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>


            </div>
        </div>
    </div>
</div>


@endsection
