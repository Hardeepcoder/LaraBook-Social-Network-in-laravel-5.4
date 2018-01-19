@extends('profile.master')

@section('content')

<div class="col-md-12 msgDiv" >

  <div style="background-color:#fff" class="col-md-3 pull-left">

    <div class="row" style="padding:10px">

       <div class="col-md-7">Friend List</div>
       <div class="col-md-5 pull-right">
         <a href="{{url('/messages')}}" class="btn btn-sm btn-info">All messages</a>
       </div>
    </div>

   @foreach($friends as $friend)

   <li @click="friendID({{$friend->id}})" v-on:click="seen = true" style="list-style:none;
    margin-top:10px; background-color:#F3F3F3" class="row">

      <div class="col-md-3 pull-left">
           <img src="{{Config::get('app.url')}}/public/img/{{$friend->pic}}"
         style="width:50px; border-radius:100%; margin:5px">
       </div>

      <div class="col-md-9 pull-left" style="margin-top:5px">
        <b> {{$friend->name}}</b><br>
        <small>Gender: {{$friend->gender}}</small>
     </div>
   </li>
   @endforeach
   <hr>
  </div>



  <div class="col-md-6 msg_main">
   <h3 align="center">Messages</h3>
<p class="alert alert-success">@{{msg}}</p>

   <div  v-if="seen">
      <input type="hidden" v-model="friend_id">
      <textarea class="col-md-12 form-control" v-model="newMsgFrom"></textarea><br>
      <input type="button" value="send message" @click="sendNewMsg()">
  </div>

  </div>

  <div class="col-md-3 pull-right msg_right">
   <h3 align="center">User Information</h3>
   <hr>
  </div>

</div>


@endsection
