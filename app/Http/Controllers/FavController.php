<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavController extends Controller
{

	public function index()
	{
		return view('myteam.index');
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
			}
			return response()->json(['success' => true]);
		} else {
			return view('errors.503');
		}
	}
}
