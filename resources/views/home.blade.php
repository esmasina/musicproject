@extends('master.master')
<link href="{{ asset('css/style.css')}}" type="text/css" rel="stylesheet" />
@section('content')
<div class="container">
<div class="row">
           <div class="col-md-4"></div>
   <div class=" col-md-4 text-center center-block">
              <div class="form-wrap">
                <h2>Sign in</h2>
                    <form role="form" action="javascript:;" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="key" id="key" class="form-control" placeholder="Password">
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
                    <hr>
              </div>
        </div>
         <div class="col-md-4"></div>
         
</div>
</div>
<div class="container logo"><div class="row">
    <div class="col-md-4 text-center"><img src="{{ asset('images/1.png') }}" class="image-responsive"></img><h4>Explore</h4></div>
      <div class="col-md-4 text-center"><img src="{{ asset('images/2.png') }}" class="image-responsive"></img><h4>Express yourself</h4></div>
        <div class="col-md-4 text-center"><img src="{{ asset('images/3.png') }}" class="image-responsive"></img><h4>Stay connected</h4></div>
</div></div>
@stop
@endsection
