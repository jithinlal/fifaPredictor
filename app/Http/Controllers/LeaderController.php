<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class LeaderController extends Controller
{
	public function index()
	{
		$id = Auth::id();
		$sa = User::find($id)->sa_user;

		if ($sa) {
			return view('leaderboard.sa');
		} else {
			return view('leaderboard.index');
		}
	}
}
