<nav class="navbar navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			    <span class="sr-only">Toggle navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
			    <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
			    <li><a href="/blog" class="{{ Request::is('blog') ? 'active' : '' }}">Blog</a></li>
			    <li><a href="/about" class="{{ Request::is('about') ? 'active' : '' }}">About</a></li>
		      	<li><a href="/contact" class="{{ Request::is('contact') ? 'active' : ''}}">Contact</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			    @if(Auth::check())
			    <li class="dropdown">
			        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i>&nbsp;&nbsp; {{ Auth::user()->name }}<span class="caret"></span></a>
			        <ul class="dropdown-menu">
			          <li><a href="{{route('posts.index')}}"><i class="fa fa-tasks"></i>&nbsp;&nbsp;My Posts</a></li>
			          <li><a href="{{route('categories.index')}}"><i class="fa fa-book"></i>&nbsp;&nbsp;Categories</a></li>
			          <li><a href="{{route('tags.index')}}"><i class="fa fa-tags"></i>&nbsp;&nbsp;Tags</a></li>

			          <!-- <li><a href="#">Profile</a></li>
			          <li><a href="#">Setting</a></li> -->
			          <li role="separator" class="divider"></li>
			          <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</a></li>
			        </ul>
			    </li>
			     @else
					<li><a href="{{ route('login') }}" class="btn btn-default btn-logreg {{ Request::is('auth/login') ? 'active2' : ''}}"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;Login</a></li>
					<li><a href="{{ route('register') }}" class="btn btn-default btn-logreg {{ Request::is('auth/register') ? 'active2' : ''}}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Register</a></li>
			     @endif
			</ul>
		</div>
			   
	</div>
</nav> 