@extends('_master')

@section('title')
	Log in - Sunshine Farms
@stop

@section('content')

<h1>Log in</h1>

{{ Form::open(array('url' => '/login')) }}

    {{ Form::label('Email') }}
    {{ Form::text('email','me@gmail.com') }}

    {{ Form::label('Password') }} (testing1)
    {{ Form::password('password') }}

    {{ Form::submit('Submit') }}

{{ Form::close() }}

	@include('nav')

@stop