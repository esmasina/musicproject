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
@endif


@stop