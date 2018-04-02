<a class="menu-toggle rounded" href="#">
    <i class="fa fa-bars"></i>
</a>

<nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
          	<a class="js-scroll-trigger" href="#page-top">{{ Auth::user()->name }}</a>
        </li>
        <li class="sidebar-nav-item">
          	<a class="js-scroll-trigger" href="#page-top">Home</a>
        </li>
        <li class="sidebar-nav-item">
          	<a class="js-scroll-trigger" href="#about">About</a>
        </li>
        <li class="sidebar-nav-item">
          	<a class="js-scroll-trigger" href="#services">Services</a>
        </li>
        <li class="sidebar-nav-item">
          	<a class="js-scroll-trigger" href="#portfolio">Portfolio</a>
        </li>
        <li class="sidebar-nav-item">
          	<a class="js-scroll-trigger" href="#contact">Contact</a>
        </li>
		<li class="sidebar-nav-item">
			<a class="js-scroll-trigger" href="#fixtures">Fixtures</a>
		</li>
		
		<li class="sidebar-nav-item">
			<a  class="js-scroll-trigger bg-danger" href="{{ route('logout') }}"
            	onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            		Logout
			</a>
		  	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
          	</form>
		</li>		
    </ul>
</nav>