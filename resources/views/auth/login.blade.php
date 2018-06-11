<!DOCTYPE html>
<html lang="en">

<head>
	<title>Fifa Predict 2018</title>
	<link rel="shortcut icon" href="/prediction_logo/favicon.ico" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login_page/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login_page/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login_page/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login_page/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login_page/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login_page/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login_page/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login_page/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login_page/css/util.css">
	<link rel="stylesheet" type="text/css" href="/login_page/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('/login_page/images/bg-01.jpg');">
			<a href="#" class="btn-google m-b-20 signin">
				<img src="/login_page/images/icons/icon-google.png" alt="GOOGLE"> Google
			</a>

			{{-- <form method="POST" action="{{ route('register') }}" id="submitForm" hidden>
				@csrf
				<div class="form-group">
					<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required autofocus> @if ($errors->has('name'))
					<span class="invalid-feedback">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group">
					<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required> @if ($errors->has('email'))
					<span class="invalid-feedback">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group">
					<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
						required> @if ($errors->has('password'))
					<span class="invalid-feedback">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group">
					<input id="photo" type="text" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo"> @if ($errors->has('photo'))
					<span class="invalid-feedback">
						<strong>{{ $errors->first('photo') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group">
					<input id="refreshtoken" type="text" class="form-control{{ $errors->has('refreshtoken') ? ' is-invalid' : '' }}" name="refreshtoken"> @if ($errors->has('refreshtoken'))
					<span class="invalid-feedback">
						<strong>{{ $errors->first('refreshtoken') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group">
					<input id="verify" type="text" class="form-control{{ $errors->has('verify') ? ' is-invalid' : '' }}" name="verify"> @if ($errors->has('verify'))
					<span class="invalid-feedback">
						<strong>{{ $errors->first('verify') }}</strong>
					</span>
					@endif
				</div>

			</form> --}}

		<p id="getkeys" data-apikey="{{$googleApiKey}}" data-projectid="{{$googleProjectId}}" data-messagingid="{{$googleProjectId}}" data-databaseurl="{{$googleDatabaseUrl}}" data-authdomain="{{$googleAuthDomain}}"></p>

		{{-- <button class="signout">click</button>
		</div> --}}
	</div>


	<div id="dropDownSelect1"></div>


	<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
	<script>
	// Initialize Firebase
		apiKey = document.getElementById('getkeys').getAttribute('data-apikey');
		projectId = document.getElementById('getkeys').getAttribute('data-projectid');
		messagingId = document.getElementById('getkeys').getAttribute('data-messagingid');
		databaseUrl = document.getElementById('getkeys').getAttribute('data-databaseurl');
		authDomain = document.getElementById('getkeys').getAttribute('data-authdomain');

		var config = {
		apiKey: apiKey,
		authDomain: authDomain,
		databaseURL: databaseUrl,
		projectId: projectId,
		storageBucket: '',
		messagingSenderId: messagingId
	};
	firebase.initializeApp(config);

	var token = '{{Session::token()}}';
	var loginUser = '{{route('loginUser')}}';

	</script>

	<!--===============================================================================================-->
	<script src="/login_page/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="/login_page/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="/login_page/vendor/bootstrap/js/popper.js"></script>
	<script src="/login_page/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="/login_page/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="/login_page/vendor/daterangepicker/moment.min.js"></script>
	<script src="/login_page/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="/login_page/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="/login_page/js/main.js"></script>

	<script src={{asset( "login_js/my-login.js")}}></script>

</body>

</html>