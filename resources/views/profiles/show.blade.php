@extends ('master.master')
@section('content')
<h4>{{ Auth::check() ? "Welcome to my page, " . Auth::user()->name : "Welcome to my page, guest" }}</h4>
 <h1>{{ $user->name }} <small>{{ "From " . $user->profile->location }}</small></h1>
<div class="bio">
<p>
{{ $user->profile->information}}
</p>
</div>

@if ($user->thisUser())
{!! link_to_route('profile.edit', 'Edit your profile', $user->name) !!}
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