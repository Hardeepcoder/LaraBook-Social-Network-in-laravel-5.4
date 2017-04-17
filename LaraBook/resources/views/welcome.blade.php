<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Fonts -->

        <!-- Styles -->
        <style>
            html, body {
                background-color: #ddd;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 110vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px0;
            }
            .head_har{
              background-color: #f6f7f9;
                    border-bottom: 1px solid #dddfe2;
                    border-radius: 2px 2px 0 0;
                    font-weight: bold;
                    padding: 8px 6px;

            }
            .left-sidebar, .right-sidebar{
              background-color:#fff;
              min-height:600px
            }
            .posts_div{
              margin-bottom: 10px;
            }
            .posts_div h3{
              margin-top:4px !important
            }
            #postText{
              border:none;
              height:120px
            }
        </style>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Dashboard</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif


<div class="col-md-12"  id="app">

  <div class="col-md-2 left-sidebar">
   <h3 align="center">Left Sidebar</h3>
   <hr>
  </div>

  <div class="col-md-7 center-con">
  @if(Auth::check())
      <div class="posts_div">
         <div class="head_har">
              @{{msg}}
          </div>
          <div style="background-color:#fff">
            <div class="row">
              <div class="col-md-1 pull-left">
                <img src="{{url('../')}}/public/img/{{Auth::user()->pic}}"
                 style="width:50px; margin:10px" class="img-rounded">
              </div>
              <div class="col-md-11 pull-right">
                <form method="post" enctype="multipart/form-data" v-on:submit.prevent="addPost">
                <textarea v-model="content" id="postText" class="form-control"
                placeholder="what's on your mind ?"></textarea>
                <button type="submit" class="btn btn-sm btn-info pull-right" style="margin:10px"
                 id="postBtn">Post</button>
                </form>
              </div>
            </div>
          </div>
      </div>
      @endif
          <div class="posts_div">
             <div class="head_har">  Posts</div>
             <div v-for="post in posts">
              <div class="col-md-12" style="background-color:#fff">
                  <div class="col-md-2 pull-left">
                    <img :src="'{{Config::get('app.url')}}/public/img/' + post.pic"
                    style="width:70px; margin:5px">
                  </div>

                  <div class="col-md-10">
                  <h3 > @{{post.name}}</h3>
                  <p> <i class="fa fa-globe"></i>
                    @{{post.city}} | @{{post.country}}</p>
                    <small><b>Gender:</b> @{{post.gender}}</small><br>
                    <small>@{{post.created_at}}</small>
                  </div>

                  <p class="col-md-12" style="color:#333" > @{{post.content}}</p>

                </div>

            </div>
          </div>
      </div>

  <div class="col-md-3 right-sidebar" >
      <h3 align="center">Right Sidebar</h3>
      <hr>
   </div>


</div>

        </div>

        <script src="public/js/app.js"></script>
<script>
$(document).ready(function(){

$('#postBtn').hide();
 $("#postText").hover(function() {
 $('#postBtn').show();
 $('#postText').animate({ 'zoom': currentZoom += .5 }, 'slow');
 });

});
</script>
    </body>
</html>
