<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Team;
use App\Stadium;
use Illuminate\Support\Facades\Auth;

class MatchController extends Controller
{
	/*
		Per match details
	 */
	public function show($id)
	{
		$match = Match::find($id);
		$teams = Team::all()->keyBy('id');
		$stadia = Stadium::all()->keyBy('id');
		if ($match->result_published) {
			$text = "/user-match/" . $match->id . "/" . Auth::id();
			return redirect($text);
		} else {
			return view('match.show', ['match' => $match, 'teams' => $teams, 'stadia' => $stadia]);
		}
	}

	public function knockOut($id)
	{
		$match = Match::find($id);
		$teams = Team::all()->keyBy('id');
		$stadia = Stadium::all()->keyBy('id');
		if ($match->result_published) {
			$text = "/knockout-match/" . $match->id . "/" . Auth::id();
			return redirect($text);
		} else {
			return view('match.knockout', ['match' => $match, 'teams' => $teams, 'stadia' => $stadia]);
		}
	}
}
