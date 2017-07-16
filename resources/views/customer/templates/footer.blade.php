		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border js-fullheight">

			<h1 id="fh5co-logo"><a href="">{{ $settings->site_title }}</a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<li class="fh5co-active"><a href="{{ route('home') }}">Home</a></li>
					<li><a href="{{ route('about') }}">About</a></li>
					<li><a href="{{ route('contact') }}">Contact</a></li>
				</ul>
			</nav>

			<div class="fh5co-footer">
				  <p><small>&copy; {{ $settings->site_email }}</span> </small></p>  
				<ul>
					<li><a href="{{ $settings->site_facebook }}"><i class="icon-facebook2"></i></a></li>
					<li><a href="{{ $settings->site_twitter }}"><i class="icon-twitter2"></i></a></li>
					
					<li><a href="{{ $settings->site_linkdn }}"><i class="icon-linkedin2"></i></a></li>
				</ul>
			</div>

		</aside>