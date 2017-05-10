@extends('profile.master')

@section('content')

<div class="col-md-12" style="padding:10px">

  <div style="background-color:#fff" class="col-md-3 pull-left">
   <h3 align="center">Click on User</h3>
   <div v-for="privsteMsg in privsteMsgs">
     <li style="list-style:none; margin-top:10px; background-color:#F3F3F3" class="row">

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
   <hr>
  </div>



  <div style="background-color:#fff; min-height:600px; border-left:5px solid #F5F8FA"
  class="col-md-3 pull-right">
   <h3 align="center">User Information</h3>
   <hr>
  </div>

</div>


@endsection
