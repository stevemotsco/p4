<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8">
	    <meta name="author" content="Steve Motsco">
	    <title>@yield("title","Sunshine Farms")</title>
		<link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet">
	    <link rel='stylesheet' href='<?php echo $baseURL.'/css/style.css'; ?>' type='text/css'>  

		@yield('head')

	</head>
	<body>
		<div>
			<div class="wbdr">
				<table>
					<tr>
						<td>
							<img src='<?php echo $baseURL.'/images/sunfarm_wtxt.gif'; ?>' alt='Generator Logo'><br/>  
						</td>
						<!--<td>
							<h1>Sunshine Farms</h1>
							<h3>Boarding - Training - Lessons<br/>Buggy Rides - Guided Trail Rides</h3> 
						</td>-->
					</tr>
				</table>
			</div>
			
		@include('nav')

		@if(Session::get('flash_message
		'))
			<div class='flash-message'>{{ Session::get('flash_message') }}</div>
		@endif

		@yield('content')

		@yield('body')

		@yield('results')


		</div>

	</body>
</html>





