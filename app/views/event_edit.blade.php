
@extends('_master')

@section('title')
	Edit Event - Sunshine Farms
@stop

@section('head')
	<script src='<?php echo $baseURL.'/js/custom1/jquery-ui.css'; ?>'></script>
@stop

@section('content')
	<div>
		<h1>Edit "{{$hevent['service']['servname']}}" Event</h1>
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

		{{ Form::hidden('id',$hevent['id']); }}
        <div class="wbdr">
			{{ Form::label('servName', 'Service: ') }}
			{{ Form::select('servName', $service_list, $hevent['service_id']) }}
	      	<br/>
	        {{ Form::label( 'event_date', 'Date: ' ) }}
	          <input class='ui-datepicker' type='date' name='event_date' id='event_date' value="{{$hevent['event_date']}}" />
	      	<br/>
			{{ Form::label('participants','Participants: ') }}
			{{ Form::selectRange('participants', 01, 12, $hevent['participants']) }}
	      	<br/>
			{{ Form::label('units','Duration: ') }}
			{{ Form::selectRange('units', 01, 12, $hevent['units']) }}
	      	<br/>
			{{ Form::submit('Save') }}

			{{---- DELETE -----}}
			{{ Form::open(array('url' => '/event/delete')) }}
				<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				{{ Form::hidden('id',$hevent['id']); }}
				<button onClick='parentNode.submit();return false;'>Delete</button>
			{{ Form::close() }}

	      	<br/>
		</div>
	{{ Form::close() }}


    @include('nav')
@stop

@section('/body')
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js'></script>
	<script src='<?php echo $baseURL.'/js/custom1/jquery-ui.js'; ?>'></script>
@stop