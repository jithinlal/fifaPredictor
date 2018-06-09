<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
	 */

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/rule-set';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'username' => 'string|max:255',
			'email' => 'string|email|max:255|unique:users',
			'password' => 'string|min:6|unique:users',
			'photo' => 'string',
			'verify' => 'string',
			'refreshtoken' => 'string',
			'useruid' => 'string'
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\User
	 */
	protected function create(array $data)
	{
		return User::create([
			'name' => $data['username'],
			'email' => $data['email'],
			'password' => Hash::make($data['email']),
			'image_url' => $data['photo'],
			'email_verify' => $data['verify'],
			'refresh_token' => $data['refreshtoken'],
			'user_uid' => $data['useruid']
		]);
	}

	public function showRegistrationForm()
	{
		$googleApiKey = $_ENV['GOOGLE_API_KEY'];
		$googleDatabaseUrl = $_ENV['GOOGLE_DATABASE_URL'];
		$googleAuthDomain = $_ENV['GOOGLE_AUTH_DOMAIN'];
		$googleProjectId = $_ENV['GOOGLE_PROJECT_ID'];
		$googleMessagingSenderId = $_ENV['GOOGLE_MESSAGING_SENDER_ID'];

		return view('auth.register', compact('googleApiKey', 'googleDatabaseUrl', 'googleAuthDomain', 'googleProjectId', 'googleMessagingSenderId'));
	}

}
