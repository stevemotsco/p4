@extends('_master')

@section('title')
	Sunshine Farms - Your Events
@stop

@section('content')
	<div>
		<h1>Services Available</h1>
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

	@foreach($services as $service)
		<div class="wbdr">
        	{{"Service: ".$service['servname'].
        	"<br/>Description: ".$service['servdesc'].
      		"<br/>Cost:  $".$service['cost_unit']." per ".$service['unit'].
      		"<br/>" 
          	}}
		</div>
	@endforeach

	@include('nav')
@stop