<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="http://getbootstrap.com/dist/js/bootstrap.js"></script>
<link type="text/css" rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>Music touch</title>
<link href="{{ asset('css/style.css')}}" type="text/css" rel="stylesheet" />

</head>
<body>
  <div class="container wr">
  <div class="container logo">
             <div class="row">
   
      <div class="text-center center-block">
        <img src="{{ asset('images/hp.png')}}" class="image-responsive"></img>
        <h1>musictouch</h1></div>
  </div>
 <!-- Second navbar for profile settings -->
    <nav class="navbar navbar-inverse">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-4">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-4">
          <ul class="nav navbar-nav">
            <li class="navm"><a href="/">Home</a></li>
            <li class="divider-vertical "></li>
            <li class="navm"><a href="#">Explore</a></li>
            <li class="divider-vertical "></li>
            <li class="navm"><a href="#">About</a></li>
            <li class="divider-vertical "></li>
            @if (Auth::guest())
            <li class="navm"><a href="/register">Register</a></li>
            <li class="divider-vertical "></li>
            <li class="navm"><a href="/login">Login</a></li>
            @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <img src="{{ asset('http://www.gravatar.com/avatar/?s=20{!! md5(Auth::user->email)!!}')}}"></img>
              {!! Auth::user()->name !!} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu nav" role="menu">
            <li class="navm">{!! link_to('/'.Auth::user()->name, 'Profile') !!}</li>
            <li class="navm"><a href="/logout">Logout</a></li>
            </ul>
          </li>
            @endif
          </ul>        
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
</div><!-- /.container-fluid -->
@yield('content')
<div class="container">
  <hr>
        <div class="text-center center-block">
        
            <br />
              <h5>Cool footer</h5>
</div>
    <hr>
</div>
</div>

<!-- End your code here -->
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
