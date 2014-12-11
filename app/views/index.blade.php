@extends('_master')

@section('title')
	Welcome to Sunshine Farms
@stop

@section('head')

@stop

@section('content')

	{{ Form::open(array('url' => '/book', 'method' => 'GET')) }}

		{{ Form::label('query','Search') }}

		{{ Form::text('query'); }}

		{{ Form::submit('Search'); }}

	{{ Form::close() }}

@stop