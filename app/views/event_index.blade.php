
@extends('_master')

@section('title')
	Your Events - Sunshine Farms
@stop

@section('content')
	<div>
		<h1>Your Events</h1>
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

	@if(sizeof($hevents) == 0)
		<h4>'<?php echo $baseURL.'/logout'; ?>'
			You do not have any events scheduled.<br/><br/>
			Would you like to <a href='<?php echo $baseURL.'/event/add'; ?>'>create one</a>?<br/><br/>
		</h4>
	@else
		@foreach($hevents as $hevent)
			<div class="wbdr">
				<?php $id = $hevent->id; ?>
	            <li>
	            	<p>
		            	{{"Service: ".$hevent['service']['servname'].
		            	"<br/>Date&#58; ".$hevent['event_date'].
		          		"<br/>Participants: ".$hevent['participants'].
		          		"<br/>Duration: ".$hevent['units']." ".$hevent['service']['unit'].
		          		"<br/>" 
			          	}}
	            	</p>
	            </li>
				<li>&nbsp;</li>
				<li><a href='<?php echo $baseURL.'/event/{{ $id }}/edit'; ?>'>Edit</a></li>
			</div>
		@endforeach
	@endif 

    @include('nav')
@stop