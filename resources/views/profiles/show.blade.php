@extends ('master.master')
@section('content')
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<link href="{{ asset('css/style.css')}}" type="text/css" rel="profilestyles" />
<div class="text-center center-block">
  <div class="container-fluid">

<h4>
	<!-- If user is logged in - display welcome @username, If not - welcome guest -->
	@if($user->thisUser())
	{{"Welcome Back, " . $user->name}}
	@elseif(Auth::check())
	{{"Welcome to my page, " . Auth::user()->name}}
	@else
	{{ "Welcome to my page, guest" }}
	@endif
	</h4>
    <div class="text-center em-background-box-content">
      <ul class="list-inline">
        <li>
          <img class="img-circle img-em-border" src="http://bootdey.com/img/Content/user_1.jpg">
        </li>
        <li>
      </ul>

      <h1 class="thin">{{ $user->name }}</h1>
      <h4>
        <i class="fa fa-map-marker"></i>
        <span class="thin">{{$user->profile->location }}</span>
      </h4>

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="semi-well-dk em-background-box-actions">
            <div class="row">
              <div class="col-md-7 push-bottom-sm">
                <ul class="list-inline no-margin v-mid-row">

                  <li class="menu">
                    <h5 class="base-header">BIO</h5>
                    <i class="text-white fa fa-user fa-3x" style="color:white;"></i>
                    </a>
                  </li>

                  <li>
                  	 <h5 class="base-header"></h5>
                    <i class="text-white fa fa-user fa-3x" style="color:white;"></i>                    </a>
                  </li>

                  <li>
                  	<h5 class="base-header">Creative</h5>
                    <a href="#" class="tip" title="Option">
                      <img class="img-circle" src="http://bootdey.com/img/Content/icons/32/PNG/32/cloud-up.png">
                    </a>
                  </li>
                  <li class="text-center">
                    <h5 class="base-header">Visitors</h5>
                    <h4 class="base-header major">4.884</h4>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  
@if($user->thisUser())
<!--  Display profile information -->
<div class="bio">
<p>
{{ $user->profile->information}}
</p>
</div>


<!-- Loop through visitors to display each visitor -->
@foreach ($visitors as $visitor)
<div class="row">
<a href='{{ link_to_route("profile", $user->name) }}'>
<img class="img-circle" src="{{ asset('http://www.gravatar.com/avatar/?s=30{!! md5($user->email)!!}')}}" />
<h5>{!! $visitor->name !!}</h5>
</a>
</div>
@endforeach
@endif
@stop