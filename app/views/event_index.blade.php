
@extends('_master')

@section('title')
	Your Events - Sunshine Farms
@stop

@section('content')
	<div>
		<h1>Your Events</h1>
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

	@if(sizeof($hevents) == 0)
		<h4>
			You do not have any events scheduled.<br/><br/>
			Would you like to <a href='<?php echo $baseURL.'/event/add'; ?>'>add an event</a>?<br/><br/>
		</h4>
	@else
		<div><a href='<?php echo $baseURL.'/event/add'; ?>'>Add Event</a></div>
		@foreach($hevents as $hevent)
			<div class="wbdr">
				<?php $id = $hevent->id; ?>
            	<p>
	            	{{"Service: ".$hevent['service']['servname'].
	            	"<br/>Date: ".$hevent['event_date'].
	          		"<br/>Participants: ".$hevent['participants'].
	          		"<br/>Duration: ".$hevent['units']." "}}
					@if($hevent['units'] > 1) {{$hevent['service']['unit']."s<br/>"}}
					@else {{$hevent['service']['unit']."<br/>"}}
					@endif
            	</p>
	            <p>
					<a href='<?php echo $baseURL; ?>/event/{{$id}}/edit'>Edit</a>
            	</p>
			</div>
		@endforeach
	@endif 

    @include('nav')
@stop