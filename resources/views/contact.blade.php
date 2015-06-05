@extends('master.master')
<link href="{{ asset('css/style.css')}}" type="text/css" rel="stylesheet" />
@section('content')
<div class="container">
<div class="row">
           <div class="col-md-4"></div>
   <div class=" col-md-4 text-center center-block">
              <div class="form-wrap">
                <h2>Contact us</h2>
                <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
{!! Form::open() !!}
<div class="form-group">
    {!! Form::label('Your Name') !!}
    {!! Form::text('name', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Your name')) !!}
</div>

<div class="form-group">
    {!! Form::label('Your E-mail Address') !!}
    {!! Form::text('email', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Your e-mail address')) !!}
</div>

<div class="form-group">
    {!! Form::label('Your Message') !!}
    {!! Form::textarea('message', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Your message')) !!}
</div>

<div class="form-group">
    {!! Form::submit('Contact Us!', 
      array('class'=>'btn btn-custom btn-lg btn-block')) !!}
</div>

{!! Form::close() !!}
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
