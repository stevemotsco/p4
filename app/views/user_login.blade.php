@extends('_master')

@section('title')
	Log in - Sunshine Farms
@stop

@section('content_banner')
	<div>
		<h1>Log in</h1>
	</div>
@stop

@section('content')

	{{ Form::open(array('url' => '/login')) }}
		<div class='wbdr alldiv'>
		    {{ Form::label('Email:') }}
		    {{ Form::text('email') }}
			<br/>
		    {{ Form::label('Password:') }} 
		    {{ Form::password('password') }}
			<br/>
		    {{ Form::submit('Submit') }}
			<br/>
		</div>
	{{ Form::close() }}

	@include('nav')

@stop