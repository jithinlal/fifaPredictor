<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayerController extends Controller
{
	public function index(Request $request)
	{
		if ($request->ajax()) {
			$teamId = (int)$request->id;
			$predictionId = (int)$request->prediction;
			if ($predictionId == 15) {
				$players = Player::where('team_id', $teamId)->where('gk', 1)->get()->toArray();
			} else if ($predictionId == 16) {
				$players = Player::where('team_id', $teamId)->where('age', '<', 22)->get()->toArray();
			} else {
				$players = Player::where('team_id', $teamId)->get()->toArray();
			}
			return response()->json(['result' => $players]);
		}
	}
}
