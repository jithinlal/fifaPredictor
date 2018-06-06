<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavController extends Controller
{
	public function index(Request $request)
	{
		$teamId = $request->team;
		$id = Auth::id();
		if (is_null($id)) {
			return redirect('/');
		}
		$user = User::find($id);
		$user->fav_team_id = $teamId;
		$user->save();
		return redirect('/');
	}
}
