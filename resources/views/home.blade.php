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
		<a class="btn btn-danger btn-xl js-scroll-trigger" href="#about">Total Points</a>
		<a class="btn btn-primary btn-xl js-scroll-trigger" href="#upcoming">Upcoming Games</a>
      </div>
      <div class="overlay"></div>
    </header>

    @include('myPoint')

	@include('mainPredict')

    @include('leaderboard')

    @include('previousMatchDay')

    @include('currentMatchDay')

    @include('upcoming')

    @include('secondnation')

	@include('fixtures')

@endsection()