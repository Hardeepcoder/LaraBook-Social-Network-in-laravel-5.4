<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LaraBook</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://use.fontawesome.com/595a5020bd.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

        <style>
            html, body {
                background-color: #ddd;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                margin: 0;
            }
            .top_bar{
              position:relative; width:99%; top:0; padding:5px; margin:0 5
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
                right:5px; top:15px
            }
            .top-left {
                position: absolute;
                width:40%

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
              height:600px;

            }
            .posts_div{margin-bottom:10px !important;}
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
              .all_posts{background-color:#fff; padding:5px;
               margin-bottom:15px; border-radius:5px;
                -webkit-box-shadow: 0 8px 6px -6px #666;
  	            -moz-box-shadow: 0 8px 6px -6px #666;
  	             box-shadow: 0 8px 6px -6px #666;}
                #commentBox{
                  background-color:#ddd;
                  padding:10px;
                  width:99%; margin:0 auto;
                  background-color:#F6F7F9;
                  padding:10px;
                  margin-bottom:10px
                }
                #commentBox li { list-style:none; padding:10px; border-bottom:1px solid #ddd}
                .commet_form{ padding:10px; margin-bottom:10px}
                .commentHand{color:blue}
                .commentHand:hover{cursor:pointer}
                .upload_wrap{
                  position:relative;
                  display:inline-block;
                  width:100%
                }
                .center-con{
                  max-height:600px;
                  position: absolute;
                  left:calc(25%);
                  overflow-y: scroll;
                }
                @media (min-width: 268px) and (max-width: 768px) {

                  .center-con{
                    max-height:600px;
                    position: relative;
                    left:0px;
                    overflow-y: scroll;
                  }
                }


        </style>

    </head>
    <body>
<div id="app">
<div class="top_bar" >

      <div class="top-left links" style="float:left">
        <input type="text" class="form-control"
        placeholder="what are you looking for?"
        v-model="qry" v-on:Keyup="autoComplete"/>
        <div class="panel-footer" v-if="results.length"
        style="position:relative; z-index:1000; border:1px solid #ccc;
        background:#fff;">
          <p v-for="result in results">
            <a :href="'{{url('profile')}}/' +  result.slug">
              <b>@{{result.name}} </b>
            </a>
          </p>
        </div>
      </div>

          <div class="top-right links" style="float:right">
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

    </div>

<div class="flex-center position-ref full-height">



  <div class="col-md-12 "  >
@if(Auth::check())
    <!-- left side start -->
    <div class="col-md-3 left-sidebar hidden-xs hidden-sm" style="position:fixed; left:10px">

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


    </div>
    <!-- left side end -->

    <!-- center content start -->
    <div class="col-md-6 col-sm-12 col-xs-12 center-con">

        <div class="posts_div">
           <div class="head_har">
          <i class="fa fa-edit"></i> @{{msg}}
            </div>

            <div style="background-color:#fff; padding:10px">
              <div class="row">
                <div class="col-md-1 col-sm-2 pull-left">
                  <img src="{{Config::get('app.url')}}/public/img/{{Auth::user()->pic}}"
                   style="width:50px; margin:5px;  border-radius:100%">
                </div>
                <div class="col-md-11 col-sm-10 pull-right">
                <div v-if="!image">
                  <form method="post" enctype="multipart/form-data" v-on:submit.prevent="addPost">
                  <textarea v-model="content" id="postText" class="form-control"
                  placeholder="what's on your mind ?"></textarea>
                  <button type="submit" class="btn btn-sm btn-primary
                   pull-right" style="margin:10px; padding:5 15 5 15; background-color:#4267b2" id="postBtn">Post</button>
                  </form>
                  </div>

                <div v-if="!image" style="position:relative;display:inline-block">
                 <div style="border:1px solid #ddd; border-radius:10px;
                 background-color:#efefef; padding:3 15 3 10; margin-bottom:10px">
                 <i class="fa fa-file-image-o"></i> <b>photo</b>
                  <input type="file" @change="onFileChange" style="position:absolute;
                  left:0;top:0; opacity:0"/>
                  </div>
                  </div>

                  <div v-else>

                <div class="upload_wrap">
                    <textarea v-model="content" id="postText" class="form-control"
                    placeholder="what's on your mind ?"></textarea>
                      <b @click="removeImg" style="right:0;position:absolute;cursor:pointer">Cancel</b>
                  <img :src="image" style="width:100px; margin:10px;"/><br>

              </div>

                  <button @click="uploadImg" class="btn btn-sm btn-info pull-right" style="margin:10px">Post</button>


                  </div>

                </div>
              </div>
            </div>
        </div>

            <div>
               <!--<div class="head_har">  Posts</div> -->

               <div v-for="post,key in posts" >

                <div class="col-md-12 all_posts">

                    <div class="col-md-1 pull-left">
                      <img :src="'{{Config::get('app.url')}}/public/img/' + post.user.pic"
                      style="width:50px; border-radius:100%">
                    </div>

                <div class="col-md-10" style="margin-left:10px;">

                <div class="row">
                 <div class="col-md-11">

                   <p><a :href="'{{url('profile')}}/' +  post.user.slug" class="user_name"> @{{post.user.name}}</a> <br>
                   <span style="color:#AAADB3">  @{{ post.created_at | myOwnTime}}
                   <i class="fa fa-globe"></i></span></p>
                 </div>
                 <div class="col-md-1 pull-right">

                    <!-- delete button goes here -->
                    <a href="#" data-toggle="dropdown"
                    style="font-size:40px; color:#ccc; left:-10px"
                     aria-haspopup="true">...</a>
                    <div class="dropdown-menu">
                      <li><a data-toggle="modal" :data-target="'#myModal' + post.id"
                        @click="openModal(post.id)">Edit</a></li>
                      <li><a>some more action</a></li>
                      <div class="dropdown-divider"></div>
                      <li v-if="post.user_id == '{{Auth::user()->id}}'">
                        <a @click="deletePost(post.id)">
                          <i class="fa fa-trash"></i> Delete</a>
                        </li>
                    </div>

                    <!-- Modal -->
                     <div class="modal fade" :id="'myModal'+ post.id" role="dialog">
                       <div class="modal-dialog">

                         <!-- Modal content-->
                         <div class="modal-content">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                             <h4 class="modal-title">Edit Post</h4>
                           </div>
                           <div class="modal-body">
                             <textarea v-model="updatedContent"
                             class="form-control">@{{post.content}}</textarea>
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-default"
                             data-dismiss="modal">Close</button>

                              <button type="button" class="btn btn-success"
                               data-dismiss="modal"
                               @click="updatePost(post.id)">Save Changes</button>
                           </div>
                         </div>

                       </div>
                     </div>
                    <!-- Modal -->

                 </div>
                </div>
                    </div>

                     <p class="col-md-12" style="color:#000; margin-top:15px; font-family:inherit">
                       @{{post.content}}
                       <br>
                       <img v-if="post.image"
                       :src="'{{Config::get('app.url')}}/public/img/' + post.image"
                       style="width:100%"/>
                     </p>
                    <div style="padding:10px; border-top:1px solid #ddd" class="col-md-12">
                      <div class="col-md-4">

                        <p v-if="post.likes.length>0">
                        liked by <b style="color:green"> @{{post.likes.length}} </b> persons
                        </p>

                        <p v-else>
                          <i class="fa fa-thumbs-up likeBtn" @click="likePost(post.id)">Like</i>
                        </p>


                      </div>

                      <div class="col-md-4">
                      <p @click="commentSeen= !commentSeen" class="commentHand">
                       Comments <b>(@{{post.comments.length}})</b></p>
                      </div>

                      </div>

                  </div>

                <div id="commentBox" v-if="commentSeen">
                  <div class="commet_form">
                     <!-- send comment-->
                     <textarea class="form-control" v-model="commentData[key]"></textarea>
                      <button class="btn btn-success"
                      @click="addComment(post,key)">Send</button>
                      </div>

                      <ul v-for="comment in post.comments">
                        <li v-if="comment.user_id=={{Auth::user()->id}}">
                          <a href="{{url('profile')}}">You</a>
                            @{{comment.comment}}</li>
                            <li v-else>
                              <a :href="'{{url('/profile')}}/' + post.user.slug">
                                @{{post.user.name}}
                              </a>
                              @{{comment.comment}}
                            </li>
                      </ul>

                  </div>


              </div>

            </div>
        </div>
    <!-- center content end -->

    <!-- right side start -->
    <div class="col-md-3 right-sidebar hidden-sm hidden-xs" style="position:fixed; right:10px">
        <h3 align="center">Right Sidebar</h3>


    </div>
    <!-- right side end -->
    @else
    <h1 align="center">Please login</h1>
@endif
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
