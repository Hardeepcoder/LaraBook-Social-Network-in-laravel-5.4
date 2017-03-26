<!DOCTYPE html>
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
                height: 100vh;
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
                margin-bottom: 30px;
            }
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


<div class="container">

@foreach($posts as $post)
    <div class="col-md-12" style="background-color:#fff">

      <div class="col-md-2 pull-left">
        <img src="{{url('../')}}/public/img/{{$post->pic}}" style="width:100px; margin:10px">
      </div>

      <div class="col-md-10">
      <h3> {{ucwords($post->name)}}</h3>
      <p> <i class="fa fa-globe"></i>
        {{ucwords($post->city)}} | {{ucwords($post->country)}}</p>
      </div>

      <p class="col-md-12" style="color:#333" > {{$post->content}}</p>

    </div>

@endforeach

</div>

        </div>

    </body>
</html>
