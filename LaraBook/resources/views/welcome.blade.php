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
            .likeBtn{
              color: #4b4f56; font-weight:bold
            }
            .left-sidebar li { padding:10px;
              border-bottom:1px solid #ddd;
            list-style:none; margin-left:-20px}

        </style>
<script src="https://use.fontawesome.com/595a5020bd.js"></script>
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

  <div class="col-md-3 left-sidebar hidden-xs hidden-sm">
@if(Auth::check())
   <ul>
     <li>
       <a href="{{ url('/profile') }}/{{Auth::user()->slug}}"> <img src="{{Config::get('app.url')}}/public/img/{{Auth::user()->pic}}"
       width="32" style="margin:5px"  />
       {{Auth::user()->name}}</a>
     </li>
     <li>
       <a href="{{url('/')}}"> <img src="{{Config::get('app.url')}}/public/img/news_feed.png"
       width="32" style="margin:5px"  />
       News Feed</a>
     </li>
     <li>
       <a href="{{url('/friends')}}"> <img src="{{Config::get('app.url')}}/public/img/friends.png"
       width="32" style="margin:5px"  />
       Friends </a>
     </li>
     <li>
       <a href="{{url('/messages')}}"> <img src="{{Config::get('app.url')}}/public/img/msg.png"
       width="32" style="margin:5px"  />
      Messages</a>
     </li>
     <li>
       <a href="{{url('/findFriends')}}"> <img src="{{Config::get('app.url')}}/public/img/friends.png"
       width="32" style="margin:5px"  />
      Find Friends</a>
     </li>
   </ul>
   @endif

  </div>

  <div class="col-md-6 col-sm-12 col-xs-12 center-con">
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
              <div class="col-md-12 col-sm-12 col-xs-12" style="background-color:#fff">
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
                  <div style="padding:10px; border-top:1px solid #ddd" class="col-md-12">

                </a>

                  </div>
                </div>

            </div>
          </div>
      </div>

  <div class="col-md-3 right-sidebar hidden-sm hidden-xs" >
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

 });

});
</script>
    </body>
</html>
