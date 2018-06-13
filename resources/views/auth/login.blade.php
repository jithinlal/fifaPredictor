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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">

	<link rel="stylesheet" type="text/css" href="/login_page/css/loader.css">
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('/login_page/images/login_back.jpg');">
			<a href="#" class="btn-google m-b-20 signin">
				<img src="/login_page/images/icons/icon-google.png" alt="GOOGLE"> Google
			</a>
		<p id="getkeys" data-apikey="{{$googleApiKey}}" data-projectid="{{$googleProjectId}}" data-messagingid="{{$googleProjectId}}" data-databaseurl="{{$googleDatabaseUrl}}" data-authdomain="{{$googleAuthDomain}}"></p>
	</div>


	<div id="dropDownSelect1"></div>

	<div id="spiner-load-ajax" class="modal bigModal">
        <div class="widget-spin">
            <i class="ace-icon fa fa-spinner fa-spin green bigger-500"></i>
        </div>
	</div>


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