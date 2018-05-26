<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Team;
use App\Stadium;

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
		return view('match.show', ['match' => $match, 'teams' => $teams, 'stadia' => $stadia]);
	}
}
