@php
	use App\Meliorate;
@endphp
<section class="content-section" id="upcoming">
	<div class="container">
		<div class="text-center">
			<h3 class="mb-5">Upcoming Fixtures </h3>
			@if($upcomingMatchDayNumber != '')
				<h4 class="mb-5">Match Day {{ $upcomingMatchDayNumber }}  </h4>
			@endif
		</div>
		<div class="row no-gutters">
		@php
			$count = count($upcomingGames);
		@endphp

			@if($count != 0 && $upcomingGames)
				@foreach ($upcomingGames as $game)

					@if($count == 1 || ($count == 3 && $loop->iteration == 3))
						<div class="col-lg-3"></div>
						<div class="col-lg-6">
							<a class="portfolio-item" href="@if($game->home_team && $game->away_team) /match/{{$game->match_id}} @else javascript: @endif">
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
													<h6 style="color:white">{{ $game->result_text }}</h6>
												@endif	
											@else
												<h3 style="color:white">{{$teams[$game->home_team]['name']}} v/s {{$teams[$game->away_team]['name']}}</h3>
											@endif
											<p>
												@if($game->result_published)
													<button class="btn btn-sm btn-primary disabled">Results Published</button>
												@elseif(Meliorate::isMatchLocked($game->match_id))
													<button class="btn btn-sm btn-danger disabled">Match Locked</button>
												@endif

												@if(Meliorate::hasUserPredictedAll($game->match_id))
													<button class="btn btn-sm btn-success disabled">Prediction Complete</button>
												@else
													<button class="btn btn-sm btn-warning disabled">Predictions : {{ Meliorate::userPredictedCount($game->match_id) }} / 6</button>
												@endif
											</p>
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
							<a class="portfolio-item" href="@if($game->home_team && $game->away_team) /match/{{$game->match_id}} @else javascript: @endif">
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
													<h6 style="color:white">{{ $game->result_text }}</h6>
												@endif	
											@else
												<h3 style="color:white">{{$teams[$game->home_team]['name']}} v/s {{$teams[$game->away_team]['name']}}</h3>
											@endif
											<p class="mb-0">{{$stadia[$game->stadium_id]['name']}}, {{$stadia[$game->stadium_id]['city']}}</p>
											<p>
												@if($game->result_published)
													<button class="btn btn-sm btn-primary disabled">Results Published</button>
												@elseif(Meliorate::isMatchLocked($game->match_id))
													<button class="btn btn-sm btn-danger disabled">Match Locked</button>
												@endif

												@if(Meliorate::hasUserPredictedAll($game->match_id))
													<button class="btn btn-sm btn-success disabled">Prediction Complete</button>
												@else
													<button class="btn btn-sm btn-warning disabled">Predictions : {{ Meliorate::userPredictedCount($game->match_id) }} / 6</button>
												@endif
											</p>
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
						<div class="col-lg-3">
						</div>

						<div class="col-lg-6">
							<a class="portfolio-item" href="#">
								<span class="caption">


										<span class="caption-content">
											<b>No Upcoming Matches, see you in 2022 :( </b>
										</span>

								</span>
								<img class="img-fluid" src="/home_img/trophy.jpg" alt="">
							</a>
						</div>

						<div class="col-lg-3">
						</div>
			@endif
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