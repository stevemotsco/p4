
@extends('_master')

@section('title')
	Add Event - Sunshine Farms
@stop

@section('head')
	<link rel='stylesheet' href='<?php echo $baseURL.'/js/custom2/themes/classic.css'; ?>' >  
	<link rel='stylesheet' href='<?php echo $baseURL.'/js/custom2/themes/classic.date.css'; ?>' >  
	<link rel='stylesheet' href='<?php echo $baseURL.'/js/custom2/themes/classic.time.css'; ?>' >  

@stop

@section('content_banner')
	<div>
		<h1>Add Event</h1>
	</div>
@stop

@section('content')

	{{ Form::open(array('url' => '/event/add')) }}
        <div class='wbdr alldiv'>
			{{ Form::label('servName', 'Service: ') }}
			{{ Form::select('servName', $service_list); }}
	      	<br/>

	      	<br/>	      	
	        {{ Form::label( 'event_date', 'Date: ' ) }}  
			<!--{{ Form::text('event_date', '', array('class' => 'form-control datepicker', 'placeholder' => 'Pick a date', )); }}-->
	        <input type='text' name='event_date' id='event_date' placeholder='Select a date'  /> <!-- placeholder='Select a date'   value=''-->

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
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src='<?php echo $baseURL.'/js/custom2/picker.js'; ?>'></script>
	<script src='<?php echo $baseURL.'/js/custom2/picker.date.js'; ?>'></script>
	<script src='<?php echo $baseURL.'/js/custom2/picker.time.js'; ?>'></script>
	<script src='<?php echo $baseURL.'/js/custom2/legacy.js'; ?>'></script>
	<script src='<?php echo $baseURL.'/js/custom/custom.js'; ?>'></script>
	<script>
	  $(function() {
	    // Enable Pickadate on an input field
	    $('#event_date').pickadate({
	    	min: new Date(2000,1,1),
   	   		disable: [{ from: [2000,1,1], to: true }],
			format: 'yyyy-mm-dd',
   			formatSubmit: 'yyyy-mm-dd'
	    });
	  });   
	</script>
@stop
