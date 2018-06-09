<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
	 */

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}


	public function showLoginForm()
	{
		$googleApiKey = $_ENV['GOOGLE_API_KEY'];
		$googleDatabaseUrl = $_ENV['GOOGLE_DATABASE_URL'];
		$googleAuthDomain = $_ENV['GOOGLE_AUTH_DOMAIN'];
		$googleProjectId = $_ENV['GOOGLE_PROJECT_ID'];
		$googleMessagingSenderId = $_ENV['GOOGLE_MESSAGING_SENDER_ID'];

		return view('auth.login', compact('googleApiKey', 'googleDatabaseUrl', 'googleAuthDomain', 'googleProjectId', 'googleMessagingSenderId'));
	}


	public function login(Request $request)
	{
		if ($request->ajax()) {
			// $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
			// if ($this->hasTooManyLoginAttempts($request)) {
			// 	$this->fireLockoutEvent($request);

			// 	return $this->sendLockoutResponse($request);
			// }

			if ($this->attemptLogin($request)) {
				return $this->sendLoginResponse($request);
			}

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
			// $this->incrementLoginAttempts($request);

			return $this->sendFailedLoginResponse($request);
		}
	}

	protected function sendFailedLoginResponse(Request $request)
	{
		app('\App\Http\Controllers\Auth\RegisterController')->register($request);
	}
}
