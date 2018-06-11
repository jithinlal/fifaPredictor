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
          	<a class="js-scroll-trigger" href="#about">Your Points</a>
        </li>
        <li class="sidebar-nav-item">
          	<a class="js-scroll-trigger" href="#services">Main Prediction</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="js-scroll-trigger" href="#leaderboard">Leaderboard</a>
        </li>
		@if(\App\Meliorate::hasTournamentBegun() && !\App\Meliorate::isFirstDay())
			<li class="sidebar-nav-item">
				<a class="js-scroll-trigger" href="#previous">Previous Day</a>
			</li>
		@endif
		@if(\App\Meliorate::hasTournamentBegun())
			<li class="sidebar-nav-item">
				<a class="js-scroll-trigger" href="#today">Today's Game</a>
			</li>
		@endif
        <li class="sidebar-nav-item">
          	<a class="js-scroll-trigger" href="#upcoming">Upcoming</a>
        </li>
        {{-- <li class="sidebar-nav-item">
          	<a class="js-scroll-trigger" href="#secondNation">Second Nation</a>
        </li> --}}
		<li class="sidebar-nav-item">
			<a class="js-scroll-trigger" href="#fixtures">Fixtures</a>
		</li>

		<li class="sidebar-nav-item" id="logoutnav">
			<a class="js-scroll-trigger bg-danger" href="{{ route('logout') }}"
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