<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fifa Predict 2018</title>
	<link rel="shortcut icon" href="/prediction_logo/favicon.ico" />

    <!-- Bootstrap Core CSS -->
    <link href="/home_vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/home_vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	{{-- <link rel="stylesheet" href="/select-styles/css/bootstrap-select.min.css"> --}}
    <link rel="stylesheet" type="text/css" href="/awselect_plugin/awselect.css">
    <link rel="stylesheet" href="/chosen_plugin/chosen.css">
    <link rel="stylesheet" href="/nice_select_plugin/css/nice-select.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="/home_vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/home_css/stylish-portfolio.min.css" rel="stylesheet">
	<link href="/my_css/hover.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="/loaders/css/style.css">
    <link rel="stylesheet" href="/loaders/css/loader-2.css">
  </head>

  <body id="page-top">
    <!-- Navigation -->
	@include('layouts.nav')

    @yield('content')

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

	<p id="getkeys" data-apikey="{{$googleApiKey}}" data-projectid="{{$googleProjectId}}" data-messagingid="{{$googleProjectId}}" data-databaseurl="{{$googleDatabaseUrl}}" data-authdomain="{{$googleAuthDomain}}"></p>

    <!-- Bootstrap core JavaScript -->
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
	</script>
    <script src="/home_vendor/jquery/jquery.min.js"></script>
	<script src="/home_vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="/select-styles/js/bootstrap-select.min.js"></script>



    <script type="text/javascript" src="/nice_select_plugin/js/jquery.nice-select.js"></script>
    <script src="/home_vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    {{-- <script src="/select-styles/js/bootstrap-select.min.js"></script> --}}
    <script type="text/javascript" src="/chosen_plugin/chosen.jquery.js"></script>
    <!-- Plugin JavaScript -->
    <script src="/home_vendor/jquery-easing/jquery.easing.min.js"></script>
    <script type="text/javascript" src="/awselect_plugin/awselect.js"></script>

    <!-- Custom scripts for this template -->
    <script src="/home_js/stylish-portfolio.min.js"></script>

	{{-- Custom Script made by me --}}
	<script src="/my_assets/script.js"></script>

	{{-- Sweet Alert --}}
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script>
		$('#logoutnav').on('click', function(){
			firebase.auth().signOut().then(function () {
				console.log('Signed Out');
			}, function (error) {
				console.error('Sign Out Error', error);
			});
		})
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  </body>

</html>
