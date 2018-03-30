@extends('layouts.app')

@section('content')

	<!-- Header -->
    <header class="masthead d-flex">
      <div class="container text-center my-auto">
        <h1 class="mb-1" style="color:white;">2018 FIFA WC PREDICTOR</h1>
        <h3 class="mb-5">
          <em style="color:black">Let's join the global carnival of Football</em>
        </h3>
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
      </div>
      <div class="overlay"></div>
    </header>

    <!-- About -->
    <section class="content-section bg-light" id="about">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h2>Stylish Portfolio is the perfect theme for your next project!</h2>
            <p class="lead mb-5">This theme features a flexible, UX friendly sidebar menu and stock photos from our friends at
              <a href="https://unsplash.com/">Unsplash</a>!</p>
            <a class="btn btn-dark btn-xl js-scroll-trigger" href="#services">What We Offer</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Services -->
    <section class="content-section bg-primary text-white text-center" id="services">
      <div class="container">
        <div class="content-section-heading">
          <h3 class="text-secondary mb-0">Services</h3>
          <h2 class="mb-5">What We Offer</h2>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-screen-smartphone"></i>
            </span>
            <h4>
              <strong>Responsive</strong>
            </h4>
            <p class="text-faded mb-0">Looks great on any screen size!</p>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-pencil"></i>
            </span>
            <h4>
              <strong>Redesigned</strong>
            </h4>
            <p class="text-faded mb-0">Freshly redesigned for Bootstrap 4.</p>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-like"></i>
            </span>
            <h4>
              <strong>Favorited</strong>
            </h4>
            <p class="text-faded mb-0">Millions of users
              <i class="fa fa-heart"></i>
              Start Bootstrap!</p>
          </div>
          <div class="col-lg-3 col-md-6">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-mustache"></i>
            </span>
            <h4>
              <strong>Question</strong>
            </h4>
            <p class="text-faded mb-0">I mustache you a question...</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Callout -->
    <section class="callout">
      <div class="container text-center">
        <h2 class="mx-auto mb-5">Welcome to
          <em>your</em>
          next website!</h2>
        <a class="btn btn-primary btn-xl" href="https://startbootstrap.com/template-overviews/stylish-portfolio/">Download Now!</a>
      </div>
    </section>

    <!-- Portfolio -->
    <section class="content-section" id="portfolio">
      <div class="container">
        <div class="content-section-heading text-center">
          <h3 class="text-secondary mb-0">Portfolio</h3>
          <h2 class="mb-5">Recent Projects</h2>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6">
            <a class="portfolio-item" href="#">
              <span class="caption">
                <span class="caption-content">
                  <h2>Stationary</h2>
                  <p class="mb-0">A yellow pencil with envelopes on a clean, blue backdrop!</p>
                </span>
              </span>
              <img class="img-fluid" src="home_img/portfolio-1.jpg" alt="">
            </a>
          </div>
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
          </div>
        </div>
      </div>
    </section>

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
		<div class="row">
			<div class="col-md-4 text-left list-group-item list-group-item-action">
				<a href="/match/{{$match->id}}">
					<img class="" src="/flags/png100px/{{$teams[$match->home_team]['iso2']}}.png"> 
				<a/>
			</div>
			<div class="col-md-4 text-center list-group-item list-group-item-action">
				<a href="/match/{{$match->id}}" class="btn btn-info">
					<span class="text-align-center">{{$teams[$match->home_team]['name']}} - {{$teams[$match->away_team]['name']}}</span>								
					<br>
					<span>{{$match->stadium->name}}</span>
				<a/>
			</div>
			<div class="col-md-4 text-light list-group-item list-group-item-action">
				<a href="/match/{{$match->id}}">
					<img class="float-right" src="/flags/png100px/{{$teams[$match->away_team]['iso2']}}.png">
				<a/>
			</div>								
		</div>
		@endif
		@endforeach
		</div>
	</section>
	


@endsection()