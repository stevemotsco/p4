
@extends('_master')

@section('title')
	Add Event - Sunshine Farms
@stop

@section('head')
	<script src='<?php echo $baseURL.'/js/jquery-ui.css'; ?>'></script>
@stop

@section('content')
	<div>
		<h1>Add Event</h1>
	</div>

	@foreach($errors->all() as $message)
		<div class='error-message'>
		    {{ $message }}
		</div>
	@endforeach

    @if(Session::get('flash_message'))
		<h4>
			<div class='flash-message'>
     			{{ Session::get('flash_message') }}
     		</div>	
     	</h4>
    @endif

	{{ Form::open(array('url' => '/event/add')) }}
        <div class="wbdr">
			{{ Form::label('servName', 'Service:') }}
			{{ Form::select('servName', $service_list); }}
	      	<br/>
	        {{ Form::label( 'event_date', 'Date:' ) }}
	          <input class='ui-datepicker' type='date' name='event_date' id='event_date' value='' />
	      	<br/>
			{{ Form::label('participants','Participants:') }}
			{{ Form::text('participants'); }}
	      	<br/>
			{{ Form::label('servName2', 'Author') }}
			{{ Form::select('servName2', $service_list); }}
	      	<br/>
			{{ Form::label('published','Published Year (YYYY)') }}
			{{ Form::text('published'); }}
	      	<br/>
			{{ Form::label('cover','Cover Image URL') }}
			{{ Form::text('cover'); }}
	      	<br/>
			{{ Form::label('purchase_link','Purchase Link URL') }}
			{{ Form::text('purchase_link'); }}
	      	<br/>
			{{ Form::submit('Add'); }}
	      	<br/>
		</div>
	{{ Form::close() }}



	

    @include('nav')
@stop

@section('/body')
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js'></script>
	<script src='<?php echo $baseURL.'/js/jquery-ui.js'; ?>'></script>
@stop