@extends('master.master')

@section('content')
<h1>Edit My Profile</h1>
{!! Form::model($user->profile, ['method' => 'PATCH', 'route' => ['profile.update', $user->name]]) !!}

  <div class="form-group">
                   {!! Form::label('location', 'Name:')!!}
                   {!! Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Location'])!!}
  </div>
<div class="form-group">
                   {!! Form::label('preferences', 'Name:')!!}
                   {!! Form::text('preferences', null, ['class' => 'form-control', 'placeholder' => 'Preferences'])!!}
  </div>
  <div class="form-group">
                   {!! Form::label('information', 'Name:')!!}
                   {!! Form::textarea('information', null, ['class' => 'form-control', 'placeholder' => 'Information'])!!}
  </div>
    <div class="form-group">
                   {!! Form::submit('Save Profile', ['class' => 'btn btn-primary']) !!}
                    </div>
{!! Form::close() !!}

@stop