
@extends('_master')

@section('title')
	Edit Event - Sunshine Farms
@stop

@section('head')
	<link rel='stylesheet' href='<?php echo $baseURL.'/js/custom2/themes/classic.css'; ?>' >  
	<link rel='stylesheet' href='<?php echo $baseURL.'/js/custom2/themes/classic.date.css'; ?>' >  
	<link rel='stylesheet' href='<?php echo $baseURL.'/js/custom2/themes/classic.time.css'; ?>' > 
@stop

@section('content_banner')
	<div>
		<h1>Edit "{{$hevent['service']['servname']}}" Event</h1>
	</div>
@stop

@section('content')

     <div class='wbdr alldiv'>
		{{ Form::open(array('url' => "/event/edit/".$hevent['id'])) }}

			{{ Form::label('servName', 'Service: ') }}
			{{ Form::select('servName', $service_list, $hevent['service_id']) }}
	      	<br/>
	        {{ Form::label( 'event_date', 'Date: ' ) }}
	        <input type='text' name='event_date' id='event_date' value='{{$hevent['event_date']}}'  /> <!-- placeholder='Select a date'   value=''-->
	      	<br/>
			{{ Form::label('participants','Participants: ') }}
			{{ Form::selectRange('participants', 01, 12, $hevent['participants']) }}
	      	<br/>
			{{ Form::label('units','Duration: ') }}
			{{ Form::selectRange('units', 01, 12, $hevent['units']) }}
	      	<br/>
	      	<table>
				<tr>
					<td>
			{{ Form::submit('Update') }}

		{{ Form::close() }}
					</td>
					<td>
		{{---- DELETE -----}}
		{{ Form::open(array('url' => '/event/delete')) }}
			{{ Form::hidden('id',$hevent['id']); }}
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button onClick='parentNode.submit();return false;'>Delete</button>
		{{ Form::close() }}
					</td>
				</tr>
			</table>
	</div>

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