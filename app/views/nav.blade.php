<nav>
	<div>
	@if(Auth::check())
		<a href='<?php echo $baseURL.'/logout'; ?>'>Log out {{ Auth::user()->email; }}</a>
	 	 | <a href='<?php echo $baseURL.'/service'; ?>'>Services</a> | <a href='<?php echo $baseURL.'/event'; ?>'>Events</a>
	@else
		<a href='<?php echo $baseURL.'/signup'; ?>'>Sign up</a> or <a href='<?php echo $baseURL.'/login'; ?>'>Log in</a>
		 | <a href='<?php echo $baseURL.'/service' ?>'>Services</a>
	@endif
	</div>
</nav>