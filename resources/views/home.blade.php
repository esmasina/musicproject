@extends('master.master')
<link href="{{ asset('css/style.css')}}" type="text/css" rel="stylesheet" />
@section('content')
        {{ Auth::check() ? "Welcome, " . Auth::user()->name : "Please, Sign Up" }}
</div> -->
<div class="container logo"><div class="row">
    <div class="col-md-4 text-center"><img src="{{ asset('images/1.png') }}" class="image-responsive"></img><h4>Explore</h4></div>
      <div class="col-md-4 text-center"><img src="{{ asset('images/2.png') }}" class="image-responsive"></img><h4>Express yourself</h4></div>
        <div class="col-md-4 text-center"><img src="{{ asset('images/3.png') }}" class="image-responsive"></img><h4>Stay connected</h4></div>
</div></div>
@stop
@endsection
