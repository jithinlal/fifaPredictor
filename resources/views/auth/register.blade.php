<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fifa Predict 2018</title>
	<link rel="shortcut icon" href="/prediction_logo/favicon.ico" />
	<meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="843739308716-8j5i5qr7kqqg9jqgie2rpk5pq41n9c4a.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
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
							<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
							<a href="#" onclick="signOut();">Sign out</a>
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
