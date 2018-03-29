<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<title>My Login Page &mdash; Bootstrap 4 Login Page Snippet</title>
	<link rel="stylesheet" type="text/css" href={{asset("login_bootstrap/css/bootstrap.min.css")}}>
	<link rel="stylesheet" type="text/css" href={{asset("login_css/my-login.css")}}>
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src={{asset("login_img/logo.jpg")}}>
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Register</h4>
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
						Copyright &copy; FIFAPREDICTSA
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
