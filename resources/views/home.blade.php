@extends('layouts.app')

@section('content')

	<!-- Header -->
    <header class="masthead d-flex">
      <div class="container text-center my-auto">
        <h1 class="mb-1" style="color:white;">2018 FIFA WC PREDICTOR</h1>
        <h3 class="mb-5">
          <em style="color:black">Let's join the global carnival of Football</em>
        </h3>
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#services">Main Prediction</a>
		<a class="btn btn-danger btn-xl js-scroll-trigger" href="#about">My Points</a>
		<a class="btn btn-primary btn-xl js-scroll-trigger" href="#portfolio">Upcoming Prediction</a>
      </div>
      <div class="overlay"></div>
    </header>

    @include('myPoint')

	@include('mainPredict')

    <!-- Callout -->
    <section class="callout">
      <div class="container text-center">
        <h2 class="mx-auto mb-5">Welcome to
          <em>your</em>
          next website!</h2>
        <a class="btn btn-primary btn-xl" href="https://startbootstrap.com/template-overviews/stylish-portfolio/">Download Now!</a>
      </div>
    </section>

    @include('upcoming')

    <!-- Call to Action -->
    <section class="content-section bg-primary text-white" id="contact">
      <div class="container text-center">
        <h2 class="mb-4">The buttons below are impossible to resist...</h2>
        <a href="#" class="btn btn-xl btn-light mr-4">Click Me!</a>
        <a href="#" class="btn btn-xl btn-dark">Look at Me!</a>
      </div>
    </section>

	<section class="content-section bg-primary text-white" id="fixtures">
		<div class="container text-center">
		<h2 class="mb-4">Fixtures</h2>
		@foreach ($matches as $match)
		@if($match->home_team != null)
		<div class="row ">
			<div class="col-md-4 text-left list-group-item list-group-item-action">
				<a href="/match/{{$match->id}}">
					<img class="hvr-grow" src="/flags/png100px/{{$teams[$match->home_team]['iso2']}}.png">
				<a/>
			</div>
			<div class="col-md-4 text-center list-group-item list-group-item-action hvr-grow">
				<a href="/match/{{$match->id}}" class="btn btn-info">
					<span class="text-align-center">{{$teams[$match->home_team]['name']}} - {{$teams[$match->away_team]['name']}}</span>
					<br>
					<span class="text-align-center">{{$match->stadium->name}}</span>
					<br>
					<span class="text-align-center">{{\Carbon\Carbon::parse(date_format(\Carbon\Carbon::parse($match->date),'Y-m-d H:i:s T'))->setTimeZone('Asia/Kolkata')->diffForHumans()}}</span>
				<a/>
			</div>
			<div class="col-md-4 text-light list-group-item list-group-item-action">
				<a href="/match/{{$match->id}}">
					<img class="float-right hvr-grow" src="/flags/png100px/{{$teams[$match->away_team]['iso2']}}.png">
				<a/>
			</div>
		</div>
		@endif
		@endforeach
		</div>
	</section>



@endsection()