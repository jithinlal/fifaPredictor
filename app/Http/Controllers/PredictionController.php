<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Team;

class PredictionController extends Controller
{
	public function index(Request $request)
	{
        // if ($request->match_id == 0) {
        //     if ($request->prediction_id > 0 || $request->prediction_id < 13) {
        //         $teamName = Team::find($request->predictionId)->name;
        //     }
        // }

		DB::table('user_match_predictions')->insert([
			'user_id' => Auth::id(),
			'match_id' => $request->match_id,
			'prediction_id' => $request->prediction_id,
			'prediction' => $request->predictionText
		]);

		return response()->json($request);
	}

	public function predictedData()
	{
		$result = DB::table('user_match_predictions')->where([['user_id', Auth::id()], ['match_id', 0]])->pluck('prediction');

		return response()->json($result);
	}


	// currently the id of the home and away score is written as plain
	// it should be taken from the database and a clear picture should be made

	public function awayScore(Request $request)
	{
		if (!is_numeric($request->score)) {
			return response()->json(['success' => false]);
		}
		DB::table('user_match_predictions')->insert([
			'user_id' => Auth::id(),
			'match_id' => $request->matchId,
			'prediction_id' => 18,
			'prediction' => $request->score
		]);

		return response()->json(['success' => true]);
	}

	public function homeScore(Request $request)
	{
		if (!is_numeric($request->score)) {
			return response()->json(['success' => false]);
		}
		DB::table('user_match_predictions')->insert([
			'user_id' => Auth::id(),
			'match_id' => $request->matchId,
			'prediction_id' => 17,
			'prediction' => $request->score
		]);

		return response()->json(['success' => true]);
	}

	public function yellowCard(Request $request)
	{
		DB::table('user_match_predictions')->insert([
			'user_id' => Auth::id(),
			'match_id' => $request->matchId,
			'prediction_id' => 19,
			'prediction' => 'yes'
		]);

		return response()->json(['success' => true]);
	}

	public function redCard(Request $request)
	{
		DB::table('user_match_predictions')->insert([
			'user_id' => Auth::id(),
			'match_id' => $request->matchId,
			'prediction_id' => 20,
			'prediction' => 'yes'
		]);

		return response()->json(['success' => true]);
	}

	public function hatTrick(Request $request)
	{
		DB::table('user_match_predictions')->insert([
			'user_id' => Auth::id(),
			'match_id' => $request->matchId,
			'prediction_id' => 21,
			'prediction' => 'yes'
		]);

		return response()->json(['success' => true]);
	}

	public function ownGoal(Request $request)
	{
		DB::table('user_match_predictions')->insert([
			'user_id' => Auth::id(),
			'match_id' => $request->matchId,
			'prediction_id' => 22,
			'prediction' => 'yes'
		]);

		return response()->json(['success' => true]);
	}

}
