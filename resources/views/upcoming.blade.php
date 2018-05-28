<!-- Portfolio -->
<section class="content-section" id="portfolio">
	<div class="container">
		<div class="text-center">
			<h3 class="mb-5">Upcoming Fixtures</h3>
		</div>
		<div class="row no-gutters">
		@php
			$count = count($upcomingGames);
		@endphp

			@foreach ($upcomingGames as $game)

				@if($count == 1 || ($count == 3 && $loop->iteration == 3))
					<div class="col-lg-3"></div>
					<div class="col-lg-6">
						<a class="portfolio-item" href="/match/{{$game->match_id}}">
							<span class="caption">
							<span class="caption-content">
								@if($game->type == 'group')<h2>Group {{$teams[$game->home_team]['group_name']}}</h2>@endif
								<img class="img-fluid" src="/flags/png100px/{{$teams[$game->home_team]['iso2']}}.png">
								<img class="img-fluid" src="/flags/png100px/{{$teams[$game->away_team]['iso2']}}.png">
								<h3 style="color:white">{{$teams[$game->home_team]['name']}} v/s {{$teams[$game->away_team]['name']}}</h3>
								<p class="mb-0">{{$stadia[$game->stadium_id]['name']}}, {{$stadia[$game->stadium_id]['city']}}</p>
							</span>
							</span>
							<img class="img-fluid" src="/stadiums/{{$stadia[$game->stadium_id]['name']}}.jpg" alt="">
						</a>
					</div>
					<div class="col-lg-3"></div>
				@else
					<div class="col-lg-6">
						<a class="portfolio-item" href="/match/{{$game->match_id}}">
							<span class="caption">
							<span class="caption-content">
								@if($game->type == 'group')<h2>Group {{$teams[$game->home_team]['group_name']}}</h2>@endif
								<img class="img-fluid" src="/flags/png100px/{{$teams[$game->home_team]['iso2']}}.png">
								<img class="img-fluid" src="/flags/png100px/{{$teams[$game->away_team]['iso2']}}.png">
								<h3 style="color:white">{{$teams[$game->home_team]['name']}} v/s {{$teams[$game->away_team]['name']}}</h3>
								<p class="mb-0">{{$stadia[$game->stadium_id]['name']}}, {{$stadia[$game->stadium_id]['city']}}</p>
							</span>
							</span>
							<img class="img-fluid" src="/stadiums/{{$stadia[$game->stadium_id]['name']}}.jpg" alt="">
						</a>
					</div>
				@endif

			@endforeach
		</div>
	</div>
</section>

{{--
<div class="col-lg-6">
				<a class="portfolio-item" href="#">
					<span class="caption">
					<span class="caption-content">
						<h2>Ice Cream</h2>
						<p class="mb-0">A dark blue background with a colored pencil, a clip, and a tiny ice cream cone!</p>
					</span>
					</span>
					<img class="img-fluid" src="home_img/portfolio-2.jpg" alt="">
				</a>
				</div>
				<div class="col-lg-6">
				<a class="portfolio-item" href="#">
					<span class="caption">
					<span class="caption-content">
						<h2>Strawberries</h2>
						<p class="mb-0">Strawberries are such a tasty snack, especially with a little sugar on top!</p>
					</span>
					</span>
					<img class="img-fluid" src="home_img/portfolio-3.jpg" alt="">
				</a>
				</div>
				<div class="col-lg-6">
				<a class="portfolio-item" href="#">
					<span class="caption">
					<span class="caption-content">
						<h2>Workspace</h2>
						<p class="mb-0">A yellow workspace with some scissors, pencils, and other objects.</p>
					</span>
					</span>
					<img class="img-fluid" src="home_img/portfolio-4.jpg" alt="">
				</a>
				</div> --}}