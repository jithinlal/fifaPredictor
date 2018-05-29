@extends('myteam.fav.layouts')

@section('content')

<section class="content-section" id="portfolio">
	<div class="container">
		<div class="text-center">
			<h3 class="mb-5">Pick your Favourite Team</h3>
		</div>
		<div class="row no-gutters">
			@foreach ($teams as $team)

				<div class="col-lg-6">
					<a class="portfolio-item" href="/favTeam/{{$team->id}}">
						<span class="caption">
						<span class="caption-content">
							<h2>Group: {{$team->group_name}}</h2>
							<h3 style="color:white">{{$team->name}}</h3>
							<p class="mb-0"></p>
						</span>
						</span>
						<img class="img-fluid" src="/flags/png1000px/{{$team->iso2}}.png" alt="">
					</a>
				</div>

			@endforeach
		</div>
	</div>
</section>

@endsection