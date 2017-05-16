@extends('profile.master')

@section('content')

<div class="col-md-12" style="padding:10px">

  <div style="background-color:#fff" class="col-md-3 pull-left">
   <h3 align="center">Click on User</h3>
   <div v-for="privsteMsg in privsteMsgs">
     <li @click="messages(privsteMsg.id)" style="list-style:none;
      margin-top:10px; background-color:#F3F3F3" class="row">

        <div class="col-md-3 pull-left">
             <img :src="'{{Config::get('app.url')}}/public/img/' + privsteMsg.pic"
           style="width:50px; border-radius:100%; margin:5px">
         </div>

        <div class="col-md-9 pull-left" style="margin-top:5px">
          <b> @{{privsteMsg.name}}</b><br>
         <p style="font-size:12px">here we will display message</p>
       </div>
     </li>
   </div>
   <hr>
  </div>



  <div style="background-color:#fff; min-height:600px; border-left:5px solid #F5F8FA"
   class="col-md-6">
   <h3 align="center">Messages</h3>
   <div v-for="singleMsg in singleMsgs">
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
   <hr>

<textarea class="col-md-12 form-control" v-model="msgFrom" @keydown="inputHandler"
 style="margin-top:15px; border:none"></textarea>

  </div>



  <div style="background-color:#fff; min-height:600px; border-left:5px solid #F5F8FA"
  class="col-md-3 pull-right">
   <h3 align="center">User Information</h3>
   <hr>
  </div>

</div>


@endsection
