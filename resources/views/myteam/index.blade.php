@extends('myteam.fav.layouts')

@section('content')

<section class="content-section" id="portfolio">
	<div class="container">
		<div class="text-center">
			<h3 class="mb-5">Pick your Favourite Team</h3>
		</div>
		<div class="text-center">
			<h4 class="mb-5">You get Bonus Points every time your team scores and wins !</h3>
		</div>
		<div class="row no-gutters">
			@foreach ($groupATeams as $team)			
				
					<div class="col-md-1">

					</div>

					<div class="col-md-4 mt-lg-5">
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
					<div class="col-md-1">

					</div>					
				
			@endforeach
		</div>

		<div class="row no-gutters mt-lg-5">
			@foreach ($groupBTeams as $team)			
				
					<div class="col-md-1">

					</div>

					<div class="col-md-4 mt-lg-5">
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
					<div class="col-md-1">

					</div>					
				
			@endforeach
		</div>

		<div class="row no-gutters mt-lg-5">
			@foreach ($groupCTeams as $team)			
				
					<div class="col-md-1">

					</div>

					<div class="col-md-4 mt-lg-5">
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
					<div class="col-md-1">

					</div>					
				
			@endforeach
		</div>

		<div class="row no-gutters mt-lg-5">
			@foreach ($groupDTeams as $team)			
				
					<div class="col-md-1">

					</div>

					<div class="col-md-4 mt-lg-5">
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
					<div class="col-md-1">

					</div>					
				
			@endforeach
		</div>

		<div class="row no-gutters mt-lg-5">
			@foreach ($groupETeams as $team)			
				
					<div class="col-md-1">

					</div>

					<div class="col-md-4 mt-lg-5">
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
					<div class="col-md-1">

					</div>					
				
			@endforeach
		</div>

		<div class="row no-gutters mt-lg-5">
			@foreach ($groupFTeams as $team)			
				
					<div class="col-md-1">

					</div>

					<div class="col-md-4 mt-lg-5">
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
					<div class="col-md-1">

					</div>					
				
			@endforeach
		</div>

		<div class="row no-gutters mt-lg-5">
			@foreach ($groupGTeams as $team)			
				
					<div class="col-md-1">

					</div>

					<div class="col-md-4 mt-lg-5">
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
					<div class="col-md-1">

					</div>					
				
			@endforeach
		</div>

		<div class="row no-gutters mt-lg-5">
			@foreach ($groupHTeams as $team)			
				
					<div class="col-md-1">

					</div>

					<div class="col-md-4 mt-lg-5">
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
					<div class="col-md-1">

					</div>					
				
			@endforeach
		</div>
	</div>
</section>

@endsection