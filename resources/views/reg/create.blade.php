@extends('master.master')
<link href="{{ asset('css/style.css')}}" type="text/css" rel="stylesheet" />
@section('content')
<div class="container">
<div class="row">
           <div class="col-md-4"></div>
   <div class=" col-md-4 text-center center-block">
              <div class="form-wrap">
                <h2>Register</h2>
                    {!! Form::open(['route' => 'reg.store']) !!}
                    <!-- Username -->
                    <div class="form-group">
                   {!! Form::label('name', 'Name:')!!}
                   {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Your Name'])!!}
                   {!! $errors->first('name', '<span class="error">:message</span>') !!}
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                   {!! Form::label('email', 'Email:')!!}
                   {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email address'])!!}
                   {!! $errors->first('email', '<span class="error">:message</span>') !!}
                    </div>
                    <!-- Password -->
                     <div class="form-group">
                   {!! Form::label('password', 'Password:')!!}
                   {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                   {!! $errors->first('password', '<span class="error">:message</span>') !!}
                    </div>
                     <!-- Repeate Password -->
                     <div class="form-group">
                   {!! Form::label('password_confirmation', 'Password:')!!}
                   {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Repeate Password'] )!!}
                    </div>
                      <div class="form-group">
                   {!! Form::submit('Create Account', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
              </div>

        </div>
         <div class="col-md-4"></div>
         
</div>
</div>
</div>
</div>
@stop
@endsection
