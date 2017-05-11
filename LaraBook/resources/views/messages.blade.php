@extends('profile.master')

@section('content')

<div class="col-md-12" style="padding:10px">

  <div style="background-color:#fff" class="col-md-3 pull-left">
   <h3 align="center">Click on User</h3>
   <div v-for="privsteMsg in privsteMsgs">
     <li @click="messages(privsteMsg.id)" style="list-style:none; margin-top:10px; background-color:#F3F3F3" class="row">

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
     <div style="float:right; background-color:#F0F0F0; padding:15px;
      margin:20px; text-align:right; color:#333; border-radius:10px" class="col-md-9">
     @{{singleMsg.user_from}}  @{{singleMsg.msg}}
    </div>
</div>
<div v-else>
    <div style="float:left; background-color:#0084ff; padding:15px;
    margin:20px; color:#fff; border-radius:10px" class="col-md-9">
    @{{singleMsg.user_from}}   @{{singleMsg.msg}}
   </div>
 </div>

   </div>
   <hr>
  </div>



  <div style="background-color:#fff; min-height:600px; border-left:5px solid #F5F8FA"
  class="col-md-3 pull-right">
   <h3 align="center">User Information</h3>
   <hr>
  </div>

</div>


@endsection
