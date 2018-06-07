<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fifa Predict 2018</title>
	<link rel="shortcut icon" href="/prediction_logo/favicon.ico" />

	<style type="text/css">
    #customBtn {
      display: inline-block;
      background: white;
      color: #444;
      width: 190px;
      border-radius: 5px;
      border: thin solid #888;
      box-shadow: 1px 1px 1px grey;
      white-space: nowrap;
    }
    #customBtn:hover {
      cursor: pointer;
    }
    span.label {
      font-family: serif;
      font-weight: normal;
    }
    span.icon {
      background: url('https://google-developers.appspot.com/identity/sign-in/g-normal.png') transparent 5px 50% no-repeat;
      display: inline-block;
      vertical-align: middle;
      width: 42px;
      height: 42px;
    }
    span.buttonText {
      display: inline-block;
      vertical-align: middle;
      padding-left: 42px;
      padding-right: 42px;
      font-size: 14px;
      font-weight: bold;
      /* Use the Roboto font that is loaded in the <head> */
      font-family: 'Roboto', sans-serif;
	  color: red;
    }
  </style>

	<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
	<script>
	// Initialize Firebase
	var config = {
		apiKey: "AIzaSyC5FFz85ydgYAdr0yH2YcmeXzqhAQSt-SI",
		authDomain: "wc-predict.firebaseapp.com",
		databaseURL: "https://wc-predict.firebaseio.com",
		projectId: "wc-predict",
		storageBucket: "",
		messagingSenderId: "444396113528"
	};
	firebase.initializeApp(config);

	</script>

	{{-- <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="843739308716-8j5i5qr7kqqg9jqgie2rpk5pq41n9c4a.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script> --}}
	<link rel="stylesheet" type="text/css" href={{asset("login_bootstrap/css/bootstrap.min.css")}}>
	<link rel="stylesheet" type="text/css" href={{asset("login_css/my-login.css")}}>

</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src={{asset("home_img/logo2.png")}}>
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Register</h4>
	<div id="gSignInWrapper" class="signin">
		<div id="customBtn" class="customGPlusSignIn">
		<span class="icon"></span>
		<span class="buttonText">Google</span>
		</div>
  	</div>

	<div>
		<button class="btn btn-danger signout">Sign Out</button>
	</div>
							{{-- <a type="button" class="btn btn-danger signout">Sign Out</a> --}}
							<b>OR</b>
							<form method="POST" action="{{ route('register') }}">
							 	@csrf
								<div class="form-group">
									<label for="name">Name</label>
									<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required autofocus>
									@if ($errors->has('name'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif
								</div>

								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required>
									@if ($errors->has('email'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required data-eye>
									@if ($errors->has('password'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								</div>

								<div class="form-group">
									<label for="password-confirm">{{ __('Confirm Password') }}</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
								</div>

								<div class="form-group no-margin">
									<button type="submit" class="btn btn-primary btn-block">
										Register
									</button>
								</div>
								<div class="margin-top20 text-center">
									Already have an account? <a href="/login">Login</a>
								</div>
							</form>
						</div>
					</div>

					<div class="footer">
						Copyright &copy; FIFAPREDICT
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src={{asset("login_js/jquery.min.js")}}></script>
	<script src={{asset("login_bootstrap/js/bootstrap.min.js")}}></script>
	<script src={{asset("login_js/my-login.js")}}></script>
</body>
</html>
