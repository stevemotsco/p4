@extends('_master')

@section('title')
	Serives - Sunshine Farms
@stop

@section('content')
	<div>
		<h1>Services Available</h1>
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