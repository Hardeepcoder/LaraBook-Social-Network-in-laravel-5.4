 <div class="col-md-3 left-sidebar">
            <div class="panel panel-default">
                <div class="panel-heading">Sidebar - Quick Links</div>

                @if(Auth::check())
                   <ul>
                     <li>
                       <a href="{{ url('/profile') }}/{{Auth::user()->slug}}">
                          <img src="{{Config::get('app.url')}}/public/img/{{Auth::user()->pic}}"
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
        </div>
