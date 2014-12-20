@extends('_master')

@section('title')
	Serives - Sunshine Farms
@stop

@section('content_banner')
	<div>
		<h1>Services Available</h1>
	</div>
@stop

@section('content')

	@foreach($services as $service)
		<div class='wbdr alldiv'>
        	{{"Service: ".$service['servname'].
        	"<br/>Description: ".$service['servdesc'].
      		"<br/>Cost:  $".$service['cost_unit']." per ".$service['unit'].
      		"<br/>" 
          	}}
		</div>
	@endforeach

	@include('nav')
@stop