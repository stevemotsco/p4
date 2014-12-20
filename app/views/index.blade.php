@extends('_master')

@section('title')
	Welcome to Sunshine Farms
@stop

@section('content_banner')
    <div>
        <h1>Welcome to Sunshine Farms</h1>
    </div>
@stop

@section('content')
	<div>
	</div>
	<div class="wbdr alldiv">
		<table>
			<tr>
				<td colspan="2">
					<h4>We are located in the northwest portion of the Florida Panhandle approximately 20 miles north of Milton, FL and 15 miles south of Brewton, AL.  
						Our property boarders the Blackwater River State Forest which covers approximately 190,000 acres.  With horses available for riders of all experience levels 
						(including none), and seemingly endless miles of trails, Sunshine Farms is the place to come to enjoy time communing with nature while on horseback.</h4> 					
				</td>
			</tr>
			<tr>
				<td class="wbdr">
					<img src='<?php echo $baseURL.'/images/ZoomOut.gif'; ?>' alt='Map Zoom Out'><br/>  
				</td>
				<td class="wbdr">
					<img src='<?php echo $baseURL.'/images/ZoomIn.gif'; ?>' alt='Map Zoom In'><br/>  
				</td>
			</tr>
		</table>
	</div>
	@include('nav')
@stop