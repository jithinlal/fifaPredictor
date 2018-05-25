<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
	public function index(Request $request)
	{
		if ($request->ajax()) {
			$teams = Team::all();
			return response()->json($teams);
		} else {
			return view('errors.503');
		}
	}

	public function groupTeams(Request $request)
	{
		if ($request->ajax()) {
			if ($request->id == 5) {
				$teams = Team::where('group_name', 'A')->get();
			} elseif ($request->id == 6) {
				$teams = Team::where('group_name', 'B')->get();
			} elseif ($request->id == 7) {
				$teams = Team::where('group_name', 'C')->get();
			} elseif ($request->id == 8) {
				$teams = Team::where('group_name', 'D')->get();
			} elseif ($request->id == 9) {
				$teams = Team::where('group_name', 'E')->get();
			} elseif ($request->id == 10) {
				$teams = Team::where('group_name', 'F')->get();
			} elseif ($request->id == 11) {
				$teams = Team::where('group_name', 'G')->get();
			} elseif ($request->id == 12) {
				$teams = Team::where('group_name', 'H')->get();
			}
			return response()->json($teams);
		} else {
			return view('errors.503');
		}
	}
}
