@extends('master.master')

@section('content')
<div class="container">
<div class="row">
           <div class="col-md-4"></div>
   <div class=" col-md-4 text-center center-block">
              <div class="form-wrap">
                <h2>Log in</h2>
                {!! Form::open(['route' => 'session.store']) !!}
                <div class="form-group">
                         {!! Form::label('email', 'Email:', ['class' => 'sr-only'])!!}
                         {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter yor email'])!!}
                         {!! $errors->first('email', '<span class="error">:message</span>') !!}

                          </div>
                        <div class="form-group">
                        {!! Form::label('password', 'Password:', ['class' => 'sr-only'])!!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter your password'])!!}
                        {!! $errors->first('password', '<span class="error">:message</span>') !!} 
                        </div>
                        {!! Form::submit('Log In', ['class' => 'btn btn-custom btn-lg btn-block']) !!}
                         @if (Session::has('flash_message'))
                        <div class="form-group">
                            <p>{!! Session::get('flash_message') !!}</p>
                        </div>
                        @endif
                        {!! Form::close() !!}
              </div>
        </div>
         <div class="col-md-4"></div>
         
</div>
</div>
@stop