<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://use.fontawesome.com/595a5020bd.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #ddd;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                margin: 0;
            }
            .full-height {
              margin-top:50px
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
              min-height:100%
            }
            .posts_div{margin-bottom:10px !important}
            .posts_div h3{
              margin-top:4px !important;

            }
            #postText{
              border:none;
              height:100px
            }
            .likeBtn{
              color: #4b4f56; font-weight:bold; cursor: pointer;
            }
            .left-sidebar li { padding:10px;
              border-bottom:1px solid #ddd;
            list-style:none; margin-left:-20px}
            .dropdown-menu{min-width:120px; left:-30px}
            .dropdown-menu a{ cursor: pointer;}
            .dropdown-divider {
              height: 1px;
              margin: .5rem 0;
              overflow: hidden;
              background-color: #eceeef;}
              .user_name{font-size:18px;
               font-weight:bold; text-transform:capitalize; margin:3px}
              .all_posts{background-color:#fff; padding:15px;
               margin-bottom:15px; border-radius:5px;
                -webkit-box-shadow: 0 8px 6px -6px #666;
  	            -moz-box-shadow: 0 8px 6px -6px #666;
  	             box-shadow: 0 8px 6px -6px #666;}


        </style>

    </head>
    <body>
      @if (Route::has('login'))
          <div class="top-right links">
              @if (Auth::check())
              <a href="{{url('jobs')}}" style="background-color:#283E4A;
              color:#fff; padding:5px 15px 5px 15px; border-radius:5px">Find Job</a>
                  <a href="{{ url('/home') }}">Dashboard
                (<span style="text-transform:capitalize;
                color:green">{{ucwords(Auth::user()->name)}}</span>)</a>
                    <a href="{{ url('/logout') }}">Logout</a>
              @else
                  <a href="{{ url('/login') }}">Login</a>
                  <a href="{{ url('/register') }}">Register</a>
              @endif
          </div>
      @endif
        <div class="flex-center position-ref full-height">



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

     <li>
       <a href="{{url('/jobs')}}"> <img src="{{Config::get('app.url')}}/public/img/jobs.png"
       width="32" style="margin:5px"  />
      Find Jobs</a>
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
                 style="width:50px; margin:5px; padding:5px" class="img-rounded">
              </div>
              <div class="col-md-11 pull-right">
                <form method="post" enctype="multipart/form-data" v-on:submit.prevent="addPost">
                <textarea v-model="content" id="postText" class="form-control"
                placeholder="what's on your mind ?"></textarea>
                <button type="submit" class="btn btn-sm btn-info pull-right" style="margin:10px" id="postBtn">Post</button>
                </form>
              </div>
            </div>
          </div>
      </div>
      @endif
          <div class="">
             <!--<div class="head_har">  Posts</div> -->

             <div v-for="post in posts">
              <div class="col-md-12 col-sm-12 col-xs-12 all_posts">
                  <div class="col-md-1 pull-left">
                    <img :src="'{{Config::get('app.url')}}/public/img/' + post.user.pic"
                    style="width:50px;">
                  </div>

              <div class="col-md-10" style="margin-left:10px">
              <div class="row">
               <div class="col-md-11">
                 <p><a :href="'{{url('profile')}}/' +  post.slug" class="user_name"> @{{post.user.name}}</a> <br>
                 <span style="color:#AAADB3">  @{{ post.created_at | myOwnTime}}
                 <i class="fa fa-globe"></i></span></p>
               </div>
               <div class="col-md-1 pull-right">
                 @if(Auth::check())
                  <!-- delete button goes here -->
                  <a href="#" data-toggle="dropdown" aria-haspopup="true">
                    <img src="{{Config::get('app.url')}}/public/img/settings.png" width="20">
                  </a>
                  <div class="dropdown-menu">
                    <li><a>some action here</a></li>
                    <li><a>some more action</a></li>
                    <div class="dropdown-divider"></div>
                    <li v-if="post.user_id == '{{Auth::user()->id}}'">
                      <a @click="deletePost(post.id)">
                        <i class="fa fa-trash"></i> Delete</a>
                      </li>
                  </div>
                  @endif
               </div>
              </div>


                  </div>

                  <p class="col-md-12" style="color:#000; margin-top:15px; font-family:inherit" >
                     @{{post.content}}
                   </p>
                  <div style="padding:10px; border-top:1px solid #ddd" class="col-md-12">
                    <!-- like button goes here -->
                    @if(Auth::check())
                    <div v-for="like in likes">
                      <div v-if="post.id==like.posts_id && like.user_id=='{{Auth::user()->id}}'">
                        <p class="likeBtn" @click="likePost(post.id)">
                          <i class="fa fa-thumbs-up"></i> Liked by you
                        </p>
                      </div>
                    
                    </div>
                    @endif
                    </div>
                </div>

            </div>
          </div>
      </div>

  <div class="col-md-3 right-sidebar hidden-sm hidden-xs" >
      <h3 align="center">Right Sidebar</h3>
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
