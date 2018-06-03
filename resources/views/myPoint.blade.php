@push('style')
	{{-- <link rel="stylesheet" href="{{asset('my_css/leaderboard.css')}}" > --}}
@endpush
<!-- Point -->
<section class="content-section bg-light" id="about">
	<div class="container text-center">
	<div class="row">
		<div class="col-lg-10 mx-auto">
		<h2>Your Total Points</h2>
		<p class="lead mb-5"></p>
		<a class="btn btn-dark btn-xl js-scroll-trigger" href="#upcoming">{{$sum}}</a>
		</div>
	</div>
	</div>
</section>