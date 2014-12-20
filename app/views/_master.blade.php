<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
	    <meta name="author" content="Steve Motsco">
	    <title>@yield("title","Sunshine Farms")</title>
		<link href='//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css' rel='stylesheet'> 
	    <link rel='stylesheet' href='<?php echo $baseURL.'/css/style.css'; ?>' type='text/css'>  

		@yield('head')

	</head>
	<body>
		<div class="alldiv">
			<div class="wbdr">
				<table>
					<tr>
						<td>
							<img src='<?php echo $baseURL.'/images/sunfarm_wtxt.gif'; ?>' alt='Sunshine Farms Logo'><br/>  
						</td>
						<!--<td>
							<h1>Sunshine Farms</h1>
							<h3>Boarding - Training - Lessons<br/>Buggy Rides - Guided Trail Rides</h3> 
						</td>-->
					</tr>
				</table>
			</div>
			
		@include('nav')

		<div class="alldiv hdr">
			@yield('content_banner')
		</div>

	    @foreach($errors->all() as $message)
	        <h4 class='error-message'>
	            {{ $message }}
	        </h4>
    	@endforeach

 	    @if(Session::get('flash_message'))
			<h4 class='flash-message'>
				{{ Session::get('flash_message') }}
	     	</h4>
	    @endif

 	    @if(Session::get('reg_message'))
			<h4 class='reg-message'>
				{{ Session::get('reg_message') }}
	     	</h4>
	    @endif

		@yield('content')

		@yield('body')

		@yield('results')

		</div>
		@yield('/body')
	</body>
</html>





