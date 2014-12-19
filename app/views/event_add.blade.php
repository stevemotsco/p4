
@extends('_master')

@section('title')
	Add Event - Sunshine Farms
@stop

@section('head')
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
	<script src='http://code.jquery.com/jquery-1.10.2.js'></script>
	<script src='https://code.jquery.com/ui/1.11.2/jquery-ui.js'></script>

	<script src='<?php echo $baseURL.'/js/bootstrap/js/bootstrap.min.js'; ?>'></script>
	<script src='<?php echo $baseURL.'/js/bootstrap/js/bootstrap-datepicker.js'; ?>'></script>

	<link rel='stylesheet' href='<?php echo $baseURL.'/js/bootstrap/css/bootstrap.min.css'; ?>' >  
@stop

@section('content')
	<div>
		<h1>Add Event</h1>
	</div>

	@foreach($errors->all() as $message)
		<h3 class='error-message'>
		    {{ $message }}
		</h3>
	@endforeach

    @if(Session::get('flash_message'))
		<h4 class='flash-message'>
			{{ Session::get('flash_message') }}
     	</h4>
    @endif

	{{ Form::open(array('url' => '/event/add')) }}
        <div class="wbdr">
			{{ Form::label('servName', 'Service: ') }}
			{{ Form::select('servName', $service_list); }}
	      	<br/>

	      	<br/>	      	
	        {{ Form::label( 'event_date', 'Date: ' ) }}  
			{{ Form::text('event_date', '', array('class' => 'form-control datepicker', 'placeholder' => 'Pick a date', )); }}

	        <!--<input type='text' name='date' id='date' placeholder='Choose a date' /> -->
	      	<br/>
			{{ Form::label('participants','Participants: ') }}
			{{ Form::selectRange('participants', 01, 12); }}
	      	<br/>
			{{ Form::label('units','Duration: ') }}
			{{ Form::selectRange('units', 01, 12); }}
	      	<br/>
			{{ Form::submit('Add'); }}
	      	<br/>
		</div>
	{{ Form::close() }}

    @include('nav')
@stop

@section('/body')
	<script src='<?php echo $baseURL.'/js/custom/custom.js'; ?>'></script>
@stop