<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Team;

class FavController extends Controller
{

	public function index()
	{
		return view('home');
	}

	public function team(Request $request)
	{
		if ($request->ajax()) {
			$teamId = $request->team;
			$id = Auth::id();
			if (is_null($id)) {
				return redirect('/');
			}
			$user = User::find($id);
			if (is_null($user->fav_team_id)) {
				$user->fav_team_id = $teamId;
				$user->save();

				$team = Team::find($teamId)->name;
			} else {
				$team = [];
			}
			return response()->json(['success' => true, 'team' => $team]);
		} else {
			return view('errors.503');
		}
	}
}
