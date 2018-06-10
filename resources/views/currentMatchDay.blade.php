<!-- Portfolio -->
<section class="content-section" id="today">
	<div class="container">
		<div class="text-center">
			<h3 class="mb-5">Today's Fixtures </h3>
			@if($currentMatchDayNumber != '')
				<h4 class="mb-5">Match Day {{ $currentMatchDayNumber }}  </h4>
			@endif
		</div>
		<div class="row no-gutters">
		@php
			$count = count($currentGames);
		@endphp

			@if($count != 0 && $currentGames)
				@foreach ($currentGames as $game)

					@if($count == 1 || ($count == 3 && $loop->iteration == 3))
						<div class="col-lg-3"></div>
						<div class="col-lg-6">
							<a class="portfolio-item" href="/match/{{$game->match_id}}">
								<span class="caption">
									@if($game->home_team && $game->away_team)

										<span class="caption-content">
											@if($game->type == 'group')
												<h2>Group {{$teams[$game->home_team]['group_name']}}</h2>
											@else
												<h2>Knock Out</h2>
											@endif
											<img class="img-fluid" src="/flags/png100px/{{$teams[$game->home_team]['iso2']}}.png">
											<img class="img-fluid" src="/flags/png100px/{{$teams[$game->away_team]['iso2']}}.png">
											@if($game->result_published)
												<h3 style="color:white">{{$teams[$game->home_team]['name']}} &nbsp; {{ $game->home_result }} &nbsp; - &nbsp; {{ $game->away_result }} &nbsp; {{$teams[$game->away_team]['name']}}</h3>
												@if($game->result_text)											
													<h4 style="color:white">{{ $game->result_text }}</h4>
												@endif	
											@else
												<h3 style="color:white">{{$teams[$game->home_team]['name']}} v/s {{$teams[$game->away_team]['name']}}</h3>
											@endif	
											<p class="mb-0">{{$stadia[$game->stadium_id]['name']}}, {{$stadia[$game->stadium_id]['city']}}</p>
										</span>

									@else

										<span class="caption-content">
											<h2>Knock Out</h2>
											<h3 style="color:white">TBA v/s TBA</h3>
											<p class="mb-0">{{$stadia[$game->stadium_id]['name']}}, {{$stadia[$game->stadium_id]['city']}}</p>
										</span>

									@endif
								</span>
								<img class="img-fluid" src="/stadiums/{{$stadia[$game->stadium_id]['name']}}.jpg" alt="">
							</a>
						</div>
						<div class="col-lg-3"></div>
					@else
						<div class="col-lg-6">
							<a class="portfolio-item" href="/match/{{$game->match_id}}">
								<span class="caption">
									@if($game->home_team && $game->away_team)

										<span class="caption-content">
											@if($game->type == 'group')
												<h2>Group {{$teams[$game->home_team]['group_name']}}</h2>
											@else
												<h2>Knock Out</h2>
											@endif
											<img class="img-fluid" src="/flags/png100px/{{$teams[$game->home_team]['iso2']}}.png">
											<img class="img-fluid" src="/flags/png100px/{{$teams[$game->away_team]['iso2']}}.png">
											@if($game->result_published)
												<h3 style="color:white">{{$teams[$game->home_team]['name']}} &nbsp; {{ $game->home_result }} &nbsp; - &nbsp; {{ $game->away_result }} &nbsp; {{$teams[$game->away_team]['name']}}</h3>
												@if($game->result_text)											
													<h4 style="color:white">{{ $game->result_text }}</h4>
												@endif	
											@else
												<h3 style="color:white">{{$teams[$game->home_team]['name']}} v/s {{$teams[$game->away_team]['name']}}</h3>
											@endif	
											<p class="mb-0">{{$stadia[$game->stadium_id]['name']}}, {{$stadia[$game->stadium_id]['city']}}</p>
										</span>

									@else

										<span class="caption-content">
											<h2>Knock Out</h2>
											<h3 style="color:white">TBA v/s TBA</h3>
											<p class="mb-0">{{$stadia[$game->stadium_id]['name']}}, {{$stadia[$game->stadium_id]['city']}}</p>
										</span>

									@endif
								</span>
								<img class="img-fluid" src="/stadiums/{{$stadia[$game->stadium_id]['name']}}.jpg" alt="">
							</a>
						</div>
					@endif

				@endforeach
			@else
				@if($hasTournamentBegun)	
					
						<div class="col-lg-3">
						</div>

						<div class="col-lg-6">
							<a class="portfolio-item" href="#">
								<span class="caption">
									

										<span class="caption-content">
											<b>No match today!</b>	
										</span>
									
								</span>
								<img class="img-fluid" src="/home_img/trophy.jpg" alt="">
							</a>
						</div>

						<div class="col-lg-3">
						</div>




				@else						
						<div class="col-lg-3">
						</div>

						<div class="col-lg-6">
							<a class="portfolio-item" href="#">
								<span class="caption">
									

										<span class="caption-content">
											<b>The Tournament hasn't begun, Yet :)</b>
										</span>
									
								</span>
								<img class="img-fluid" src="/home_img/trophy.jpg" alt="">
							</a>
						</div>

						<div class="col-lg-3">
						</div>
				@endif
			@endif
		</div>
	</div>
</section>