		<nav>
			<ul>
			@if(Auth::check())
				<li><a href='<?php echo $baseURL.'/logout'; ?>'>Log out {{ Auth::user()->email; }}</a></li>
			<!--	<li><a href='/book'>All Books</a></li>
				<li><a href='/book/search'>Search Books (w/ Ajax)</a></li>
				<li><a href='/tag'>All Tags</a></li>
				<li><a href='/book/create'>+ Add Book</a></li>
				<li><a href='/debug/routes'>Routes</a></li> -->
			@else
				<li><a href='<?php echo $baseURL.'/signup'; ?>'>Sign up</a> or <a href='<?php echo $baseURL.'/login'; ?>'>Log in</a></li>
			@endif
			</ul>
		</nav>