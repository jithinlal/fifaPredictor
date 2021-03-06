<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Team;
use App\UserMatchPrediction;
use App\Match;

class PredictionController extends Controller
{
	public function index(Request $request)
	{
        // if ($request->match_id == 0) {
        //     if ($request->prediction_id > 0 || $request->prediction_id < 13) {
        //         $teamName = Team::find($request->predictionId)->name;
        //     }
		// }
		/*
			Records user predictions
		 */
		if ($request->ajax()) {
			DB::table('user_match_predictions')->insert([
				'user_id' => Auth::id(),
				'match_id' => $request->match_id,
				'prediction_id' => $request->prediction_id,
				'prediction' => $request->predictionText
			]);

			return response()->json($request);
		} else {
			return view('errors.503');
		}
	}

	public function predictedData(Request $request)
	{
		if ($request->ajax()) {
			$result = DB::table('user_match_predictions')->where([['user_id', Auth::id()], ['match_id', 0]])->whereIn('prediction_id', [1,2,3,4])->pluck('prediction');

			return response()->json($result);
		} else {
			return view('errors.503');
		}
	}


	// currently the id of the home and away score is written as plain
	// it should be taken from the database and a clear picture should be made

	/*
		records away score
	 */
	public function awayScore(Request $request)
	{
		if ($request->ajax()) {
			if (!is_numeric($request->score)) {
				return response()->json(['success' => false]);
			}

			$homeTeamId = Match::find($request->matchId)->home_team;
			$query = UserMatchPrediction::where([['user_id', Auth::id()], ['match_id', $request->matchId], ['prediction_id', 18]]);
			$preCount = $query->get()->count();
			if ($preCount > 0) {
				$query->update(['prediction' => $request->score]);
			} else {
				$anoQuery = UserMatchPrediction::where([['user_id', Auth::id()], ['match_id', $request->matchId], ['prediction_id', 17]]);
				$preAnoQuery = $query->get()->count();
				if ($preAnoQuery == 0) {
					DB::table('user_match_predictions')->insert([
						'user_id' => Auth::id(),
						'match_id' => $request->matchId,
						'prediction_id' => 17,
						'prediction' => 0,
						'team_id' => $homeTeamId
					]);
				}
				DB::table('user_match_predictions')->insert([
					'user_id' => Auth::id(),
					'match_id' => $request->matchId,
					'prediction_id' => 18,
					'prediction' => $request->score,
					'team_id' => $request->teamId
				]);
			}
			return response()->json(['success' => true]);
		} else {
			return view('errors.view');
		}
	}

	/*
		records home score
	 */
	public function homeScore(Request $request)
	{
		if ($request->ajax()) {
			if (!is_numeric($request->score)) {
				return response()->json(['success' => false]);
			}
			$awayTeamId = Match::find($request->matchId)->away_team;

			$query = UserMatchPrediction::where([['user_id', Auth::id()], ['match_id', $request->matchId], ['prediction_id', 17]]);
			$preCount = $query->get()->count();
			if ($preCount > 0) {
				$query->update(['prediction' => $request->score]);
			} else {
				$anoQuery = UserMatchPrediction::where([['user_id', Auth::id()], ['match_id', $request->matchId], ['prediction_id', 18]]);
				$preAnoQuery = $query->get()->count();
				if ($preAnoQuery == 0) {
					DB::table('user_match_predictions')->insert([
						'user_id' => Auth::id(),
						'match_id' => $request->matchId,
						'prediction_id' => 18,
						'prediction' => 0,
						'team_id' => $awayTeamId
					]);
				}
				DB::table('user_match_predictions')->insert([
					'user_id' => Auth::id(),
					'match_id' => $request->matchId,
					'prediction_id' => 17,
					'prediction' => $request->score,
					'team_id' => $request->teamId
				]);
			}
			return response()->json(['success' => true]);
		} else {
			return view('errors.view');
		}
	}

	/*
		records yellow card
	 */
	public function yellowCard(Request $request)
	{
		if ($request->ajax()) {
			$query = UserMatchPrediction::where([['user_id', Auth::id()], ['match_id', $request->matchId], ['prediction_id', 19]]);
			$preCount = $query->get()->count();
			if ($preCount == 0) {
				if ($request->predictionText) {
					DB::table('user_match_predictions')->insert([
						'user_id' => Auth::id(),
						'match_id' => $request->matchId,
						'prediction_id' => 19,
						'prediction' => 1
					]);
				} else {
					DB::table('user_match_predictions')->insert([
						'user_id' => Auth::id(),
						'match_id' => $request->matchId,
						'prediction_id' => 19,
						'prediction' => 0
					]);
				}
			} else {
				if ($request->predictionText) {
					$query->update(['prediction' => 1]);
				} else {
					$query->update(['prediction' => 0]);
				}
			}
			return response()->json(['success' => true]);
		} else {
			return view('errors.view');
		}
	}

	/*
		records red card
	 */
	public function redCard(Request $request)
	{
		if ($request->ajax()) {
			$query = UserMatchPrediction::where([['user_id', Auth::id()], ['match_id', $request->matchId], ['prediction_id', 20]]);
			$preCount = $query->get()->count();
			if ($preCount == 0) {
				if ($request->predictionText) {
					DB::table('user_match_predictions')->insert([
						'user_id' => Auth::id(),
						'match_id' => $request->matchId,
						'prediction_id' => 20,
						'prediction' => 1
					]);
				} else {
					DB::table('user_match_predictions')->insert([
						'user_id' => Auth::id(),
						'match_id' => $request->matchId,
						'prediction_id' => 20,
						'prediction' => 0
					]);
				}
			} else {
				if ($request->predictionText) {
					$query->update(['prediction' => 1]);
				} else {
					$query->update(['prediction' => 0]);
				}
			}
			return response()->json(['success' => true]);
		} else {
			return view('errors.view');
		}
	}

	/*
		records hat trick
	 */
	public function hatTrick(Request $request)
	{
		if ($request->ajax()) {
			$query = UserMatchPrediction::where([['user_id', Auth::id()], ['match_id', $request->matchId], ['prediction_id', 21]]);
			$preCount = $query->get()->count();
			if ($preCount == 0) {
				if ($request->predictionText) {
					DB::table('user_match_predictions')->insert([
						'user_id' => Auth::id(),
						'match_id' => $request->matchId,
						'prediction_id' => 21,
						'prediction' => 1
					]);
				} else {
					DB::table('user_match_predictions')->insert([
						'user_id' => Auth::id(),
						'match_id' => $request->matchId,
						'prediction_id' => 21,
						'prediction' => 0
					]);
				}
			} else {
				if ($request->predictionText) {
					$query->update(['prediction' => 1]);
				} else {
					$query->update(['prediction' => 0]);
				}
			}
			return response()->json(['success' => true]);
		} else {
			return view('errors.view');
		}
	}

	/*
		records own goal
	 */
	public function ownGoal(Request $request)
	{
		if ($request->ajax()) {
			$query = UserMatchPrediction::where([['user_id', Auth::id()], ['match_id', $request->matchId], ['prediction_id', 22]]);
			$preCount = $query->get()->count();
			if ($preCount == 0) {
				if ($request->predictionText) {
					DB::table('user_match_predictions')->insert([
						'user_id' => Auth::id(),
						'match_id' => $request->matchId,
						'prediction_id' => 22,
						'prediction' => 1
					]);
				} else {
					DB::table('user_match_predictions')->insert([
						'user_id' => Auth::id(),
						'match_id' => $request->matchId,
						'prediction_id' => 22,
						'prediction' => 0
					]);
				}
			} else {
				if ($request->predictionText) {
					$query->update(['prediction' => 1]);
				} else {
					$query->update(['prediction' => 0]);
				}
			}
			return response()->json(['success' => true]);
		} else {
			return view('errors.view');
		}
	}
}
