
@extends('_master')

@section('title')
	Sunshine Farms - Your Events
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
		<h4>
			You do not have any events scheduled.<br/><br/>
			Would you like to <a href="/event/create">create one</a>?<br/><br/>
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
				<li><a href='/event/{{ $id }}/edit'>Edit</a></li>
			</div>
		@endforeach
	@endif 

    @include('nav')
@stop