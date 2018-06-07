<?php

namespace App\Http\Controllers;

use App\Result;
use App\Match;
use App\Team;
use App\Stadium;
use Illuminate\Http\Request;
use App\UserMatchPrediction;
use Illuminate\Support\Facades\Auth;

class UserResultController extends Controller
{
	public function index(Request $request)
	{
		$match_id = $request->match;
		$user_id = $request->user;

		$user_home_score_prediction = UserMatchPrediction::where([['match_id', $match_id], ['user_id', Auth::id()], ['prediction_id', 17]])->get();
		if ($user_home_score_prediction->count() == 0) {
			$user_home_point = '';
		} else {
			$user_home_point = $user_home_score_prediction->first()->pointsObtained;
			$user_home_prediction = $user_home_score_prediction->first()->prediction;
		}

		$user_away_score_prediction = UserMatchPrediction::where([['match_id', $match_id], ['user_id', Auth::id()], ['prediction_id', 18]])->get();
		if ($user_away_score_prediction->count() == 0) {
			$user_away_point = '';
		} else {
			$user_away_point = $user_away_score_prediction->first()->pointsObtained;
			$user_away_prediction = $user_away_score_prediction->first()->prediction;
		}

		$user_yellow_card_prediction = UserMatchPrediction::where([['match_id', $match_id], ['user_id', Auth::id()], ['prediction_id', 19]])->get();
		if ($user_yellow_card_prediction->count() == 0) {
			$user_yellow_point = '';
		} else {
			$user_yellow_point = $user_yellow_card_prediction->first()->pointsObtained;
			$user_yellow_prediction = $user_yellow_card_prediction->first()->prediction;
			if ($user_yellow_prediction == 0) {
				$user_yellow_prediction = 'NO';
			} else {
				$user_yellow_prediction = 'YES';
			}
		}

		$user_red_card_prediction = UserMatchPrediction::where([['match_id', $match_id], ['user_id', Auth::id()], ['prediction_id', 20]])->get();
		if ($user_red_card_prediction->count() == 0) {
			$user_red_point = '';
		} else {
			$user_red_point = $user_red_card_prediction->first()->pointsObtained;
			$user_red_prediction = $user_red_card_prediction->first()->prediction;
			if ($user_red_prediction == 0) {
				$user_red_prediction = 'NO';
			} else {
				$user_red_prediction = 'YES';
			}
		}

		$user_hat_trick_prediction = UserMatchPrediction::where([['match_id', $match_id], ['user_id', Auth::id()], ['prediction_id', 21]])->get();
		if ($user_hat_trick_prediction->count() == 0) {
			$user_hat_point = '';
		} else {
			$user_hat_point = $user_hat_trick_prediction->first()->pointsObtained;
			$user_hat_prediction = $user_hat_trick_prediction->first()->prediction;
			if ($user_hat_prediction == 0) {
				$user_hat_prediction = 'NO';
			} else {
				$user_hat_prediction = 'YES';
			}
		}

		$user_own_goal_prediction = UserMatchPrediction::where([['match_id', $match_id], ['user_id', Auth::id()], ['prediction_id', 22]])->get();
		if ($user_own_goal_prediction->count() == 0) {
			$user_own_point = '';
		} else {
			$user_own_point = $user_own_goal_prediction->first()->pointsObtained;
			$user_own_prediction = $user_own_goal_prediction->first()->prediction;
			if ($user_own_prediction == 0) {
				$user_own_prediction = 'NO';
			} else {
				$user_own_prediction = 'YES';
			}
		}

		$home_outcome = Result::where([['match_id', $match_id], ['prediction_id', 17]])->get()->first()->outcome;
		$home_comment = Result::where([['match_id', $match_id], ['prediction_id', 17]])->get()->first()->comment;
		$away_outcome = Result::where([['match_id', $match_id], ['prediction_id', 18]])->get()->first()->outcome;
		$away_comment = Result::where([['match_id', $match_id], ['prediction_id', 18]])->get()->first()->comment;
		$yellow_outcome = Result::where([['match_id', $match_id], ['prediction_id', 19]])->get()->first()->outcome;
		$yellow_comment = Result::where([['match_id', $match_id], ['prediction_id', 19]])->get()->first()->comment;
		if ($yellow_outcome == 0) {
			$yellow_outcome = 'NO';
		} else {
			$yellow_outcome = 'YES';
		}
		$red_outcome = Result::where([['match_id', $match_id], ['prediction_id', 20]])->get()->first()->outcome;
		$red_comment = Result::where([['match_id', $match_id], ['prediction_id', 20]])->get()->first()->comment;
		if ($red_outcome == 0) {
			$red_outcome = 'NO';
		} else {
			$red_outcome = 'YES';
		}
		$hat_outcome = Result::where([['match_id', $match_id], ['prediction_id', 21]])->get()->first()->outcome;
		$hat_comment = Result::where([['match_id', $match_id], ['prediction_id', 21]])->get()->first()->comment;
		if ($hat_outcome == 0) {
			$hat_outcome = 'NO';
		} else {
			$hat_outcome = 'YES';
		}
		$own_outcome = Result::where([['match_id', $match_id], ['prediction_id', 22]])->get()->first()->outcome;
		$own_comment = Result::where([['match_id', $match_id], ['prediction_id', 22]])->get()->first()->comment;
		if ($own_outcome == 0) {
			$own_outcome = 'NO';
		} else {
			$own_outcome = 'YES';
		}
		$winner_outcome = Result::where([['match_id', $match_id], ['prediction_id', 23]])->get()->first()->outcome;

		$match = Match::find($match_id);
		$teams = Team::all()->keyBy('id');
		$stadia = Stadium::all()->keyBy('id');
		return view('outcome', compact('match', 'teams', 'stadia', 'user_own_prediction', 'user_hat_prediction', 'user_red_prediction', 'user_yellow_prediction', 'user_away_prediction', 'user_home_prediction', 'user_home_point', 'user_away_point', 'user_yellow_point', 'user_red_point', 'user_hat_point', 'user_own_point', 'home_outcome', 'away_outcome', 'yellow_outcome', 'red_outcome', 'hat_outcome', 'own_outcome', 'winner_outcome'));
	}
}
