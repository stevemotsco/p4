
@extends('_master')

@section('title')
	Your Events - Sunshine Farms
@stop

@section('content_banner')
	<div>
		<h1>Your Events</h1>
	</div>
@stop

@section('content')

	@if(sizeof($hevents) == 0)
		<h4>
			You do not have any events scheduled.<br/><br/>
			Would you like to <a href='<?php echo $baseURL.'/event/add'; ?>'>add an event</a>?<br/><br/>
		</h4>
	@else
		<div class="alldiv"><a href='<?php echo $baseURL.'/event/add'; ?>'>Add Event</a></div>
		@foreach($hevents as $hevent)
			<div class='wbdr alldiv'>
				<?php $id = $hevent->id; $dt = new DateTime(); ?>
				<p>
	            	{{"Event ID: ".$hevent['id'].
	            	"<br/>Service: ".$hevent['service']['servname'].
	            	"<br/>Date: ".$hevent['event_date'].
	          		"<br/>Participants: ".$hevent['participants'].
	          		"<br/>Duration: ".$hevent['units']." "}}
					@if($hevent['units'] > 1) {{$hevent['service']['unit']."s<br/>"}}
					@else {{$hevent['service']['unit']."<br/>"}}
					@endif
            	</p>
				<?php
				$ed = new DateTime($hevent['event_date']);
				#echo $ed->format("Y-m-d")." eventdate";
				#echo $dt->format("Y-m-d")." today";
				if ($ed < $dt) {
				    #echo '<a href="'.$baseURL.'/event/review/'.$id.'">Write a Review</a>';
				} else {
				    echo '<a href="'.$baseURL.'/event/edit/'.$id.'">Edit</a>';
				}
				?>
				<!--<a href='<?php echo $baseURL; ?>/event/edit/{{$id}}'>Edit</a>-->
			</div>
		@endforeach
	@endif 

    @include('nav')
@stop