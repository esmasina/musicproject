
@foreach ($users->chunk(3) as $userGroup)
<div class="row">
@foreach ($userGroup as $user)
<div class="col-md-3 single-user">

<a href='{{ link_to_route("profile", $user->name) }}'>
<img class="img-circle" src="{{ asset('http://www.gravatar.com/avatar/{!! md5($user->email)!!}')}}">
</img>
</a>

</a>
<h4 class="single-user-username">
	{!! link_to_route('profile', $user->name, $user->name) !!}
</h4>
<div>
@endforeach
</div>
@endforeach

