@extends('_master')

@section('title')
	Log in - Sunshine Farms
@stop

@section('content')
	<div>
		<h1>Log in</h1>
	</div>

	@foreach($errors->all() as $message)
		<h3 class='error-message'>
		    {{ $message }}
		</h3>
	@endforeach

	{{ Form::open(array('url' => '/login')) }}
		<div class="wbdr">
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