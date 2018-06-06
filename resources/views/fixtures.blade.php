<section class="content-section bg-primary text-white" id="fixtures">
	<div class="container text-center">
	<h2 class="mb-4">Fixtures</h2>
	@foreach ($matches as $match)
	@if($match->home_team != null)
	<div class="row ">
		<div class="col-md-4 text-left list-group-item list-group-item-action">
			@if(\App\Meliorate::isMatchPublised($match->id))
			<a href="/user-match/{{$match->id}}/{{auth()->id()}}">
				<img class="hvr-grow" src="/flags/png100px/{{$teams[$match->home_team]['iso2']}}.png">
			<a/>
			@else
			<a href="/match/{{$match->id}}">
				<img class="hvr-grow" src="/flags/png100px/{{$teams[$match->home_team]['iso2']}}.png">
			<a/>
			@endif
		</div>
		<div class="col-md-4 text-center list-group-item list-group-item-action hvr-grow">
			@if(\App\Meliorate::isMatchPublised($match->id))
			<a href="/user-match/{{$match->id}}/{{auth()->id()}}" class="btn btn-info">
				<span class="text-align-center">{{$teams[$match->home_team]['name']}} - {{$teams[$match->away_team]['name']}}</span>
				<br>
				<span class="text-align-center">{{$match->stadium->name}}</span>
				<br>
				<span class="text-align-center">{{ \App\Meliorate::daysFromToday($match->date) }}</span>
			<a/>
			@else
			<a href="/match/{{$match->id}}" class="btn btn-info">
				<span class="text-align-center">{{$teams[$match->home_team]['name']}} - {{$teams[$match->away_team]['name']}}</span>
				<br>
				<span class="text-align-center">{{$match->stadium->name}}</span>
				<br>
				<span class="text-align-center">{{ \App\Meliorate::daysFromToday($match->date) }}</span>
			<a/>
			@endif
		</div>
		@if(\App\Meliorate::isMatchPublised($match->id))
		<div class="col-md-4 text-light list-group-item list-group-item-action">
			<a href="/user-match/{{$match->id}}/{{auth()->id()}}">
				<img class="float-right hvr-grow" src="/flags/png100px/{{$teams[$match->away_team]['iso2']}}.png">
			<a/>
		</div>
		@else
		<div class="col-md-4 text-light list-group-item list-group-item-action">
			<a href="/match/{{$match->id}}">
				<img class="float-right hvr-grow" src="/flags/png100px/{{$teams[$match->away_team]['iso2']}}.png">
			<a/>
		</div>
		@endif
	</div>
	@endif
	@endforeach
	</div>
</section>