<!-- Portfolio -->
<section class="content-section" id="portfolio">
	<div class="container">
		<div class="text-center">
			<h3 class="mb-5">Upcoming Fixtures</h3>
		</div>
		<div class="row no-gutters">
			@foreach ($upcomingGames as $game)


				<div class="col-lg-6">
					<a class="portfolio-item" href="#">
						<span class="caption">
						<span class="caption-content">
							<h2>{{$teams[$game->home_team]['name']}} v/s {{$teams[$game->away_team]['name']}}</h2>
							<p class="mb-0">A yellow pencil with envelopes on a clean, blue backdrop!</p>
						</span>
						</span>
						<img class="img-fluid" src="home_img/portfolio-1.jpg" alt="">
					</a>
				</div>


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