@extends ('master.master')

@section('content')

@if ($user->thisUser())
{!! link_to_route('profile.edit', 'Edit your profile', $user->name) !!}
 @endif

 <h1>{{ $user->name }} <small>{{ "From " . $user->profile->location }}</small></h1>
<div class="bio">
<p>
{{ $user->profile->information}}
</p>
</div>

@stop