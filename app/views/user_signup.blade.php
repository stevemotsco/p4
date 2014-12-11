@extends('_master')

@section('title')
	Sign Up - Sunshine Farms
@stop

@section('content')
<h1>Sign up</h1>

@foreach($errors->all() as $message)
	<div class='error'>{{ $message }}</div>
@endforeach

{{ Form::open(array('url' => '/signup')) }}

    {{ Form::label('Email') }}
    {{ Form::text('email','me@gmail.com') }}
    {{ Form::label('Confirm Email') }}
    {{ Form::text('email_confirmation','me@gmail.com') }}
 
    {{ Form::label('Password') }}
    {{ Form::password('password') }}
    <small>Min 8  Alpha-Numeric Characters</small>
    {{ Form::label('Confirm Password') }}
    {{ Form::password('password_confirmation') }}


    {{ Form::submit('Submit') }}

{{ Form::close() }}
@stop