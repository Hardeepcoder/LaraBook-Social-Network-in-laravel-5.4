@extends('profile.master')

@section('content')

<div class="col-md-12 msgDiv">

  <div style="background-color:#fff" class="col-md-3 pull-left">
    <div class="row" style="padding:10px">
       <div class="col-md-4"> </div>
       <div class="col-md-6">Messenger</div>
       <div class="col-md-2 pull-right">
         <a href="{{url('/newMessage')}}">
           <img src="{{Config::get('app.url')}}/public/img/compose.png" title="Send New Messages"></a>
       </div>
    </div>

   <div v-for="privsteMsg in privsteMsgs">
     <li v-if="privsteMsg.status==1"  @click="messages(privsteMsg.id)" style="list-style:none;
      margin-top:10px; background-color:#F3F3F3" class="row">

        <div class="col-md-3 pull-left">
             <img :src="'{{Config::get('app.url')}}/public/img/' + privsteMsg.pic"
           style="width:50px; border-radius:100%; margin:5px">
         </div>

        <div class="col-md-9 pull-left" style="margin-top:5px">
          <b> @{{privsteMsg.name}}</b><br>
          <small>Gender: @{{privsteMsg.gender}}</small>
       </div>
     </li>

     <li v-else  @click="messages(privsteMsg.id)" style="list-style:none;
      margin-top:10px; background-color:#fff" class="row">

        <div class="col-md-3 pull-left">
             <img :src="'{{Config::get('app.url')}}/public/img/' + privsteMsg.pic"
           style="width:50px; border-radius:100%; margin:5px">
         </div>

        <div class="col-md-9 pull-left" style="margin-top:5px">
          <b> @{{privsteMsg.name}}</b><br>
          <small>Gender: @{{privsteMsg.gender}}</small>
       </div>
     </li>

   </div>
   <hr>
  </div>



  <div class="col-md-6 msg_main">
   <h3 align="center">Messages</h3>
   <p class="alert alert-success">@{{msg}}</p>
   <div style="max-height: 200px !important;  overflow-y: scroll;">
   <div v-for="singleMsg in singleMsgs" >
    <div v-if="singleMsg.user_from == <?php echo Auth::user()->id; ?>">
      <div class="col-md-12" style="margin-top:10px">
        <img :src="'{{Config::get('app.url')}}/public/img/' + singleMsg.pic"
      style="width:30px; border-radius:100%; margin-left:5px" class="pull-right">
         <div style="float:right; background-color:#0084ff; padding:5px 15px 5px 15px;
          margin-right:10px;color:#333; border-radius:10px; color:#fff;" >
          @{{singleMsg.msg}}
        </div>
      </div>
    </div>
    <div v-else>
        <div class="col-md-12 pull-right"  style="margin-top:10px">
          <img :src="'{{Config::get('app.url')}}/public/img/' + singleMsg.pic"
        style="width:30px; border-radius:100%; margin-left:5px" class="pull-left">
        <div style="float:left; background-color:#F0F0F0; padding: 5px 15px 5px 15px;
        border-radius:10px; text-align:right; margin-left:5px ">
      @{{singleMsg.msg}}
       </div>

       </div>
     </div>
   </div>
 </div>
   <hr>

   <input type="hidden" v-model="conID">
   <textarea class="col-md-12 form-control" v-model="msgFrom" @keydown="inputHandler"
    style="margin-top:15px; border:none"></textarea>

  </div>


  <div class="col-md-3 pull-right msg_right">
   <h3 align="center">User Information</h3>
   <hr>
  </div>

</div>


@endsection
