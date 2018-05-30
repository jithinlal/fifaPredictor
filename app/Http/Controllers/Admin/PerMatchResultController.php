<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

use App\Prediction;
use App\Team;
use App\Day;
use App\Match;
use App\MatchDay;
use App\Result;
use App\UserMatchPrediction;

class PerMatchResultController extends Controller
{
    public function index()
    {
        $days = Day::all()->pluck('day', 'id');
        if (!empty($days) && count($days)) {
            $currentDayMatchCount = [];
            $currentDayMatches = [];
            foreach ($days as $key => $day) {
                $currentDayMatchCount[$key] = MatchDay::where('day_id', $key)->count();
                $currentDayMatches[$key] = MatchDay::where('day_id', $key)->pluck('match_id');
            }
            $matches = Match::all()->keyBy('id');
            $teams = Team::all()->pluck('name', 'id');
        }
        return view('per-match-result.list', compact('days', 'currentDayMatches', 'currentDayMatchCount', 'matches', 'teams'));
        //return view('per-match-result.list', $data);
    }

    public function match(Match $match)
    {
        $data = [];
        $data['match'] = $match;
        $data['teams'] = Team::all()->pluck('name', 'id');
        $data['predictions'] = Prediction::where('type', 'group')->get();
        $data['existingPredictions'] = Result::where('match_id', $match->id)->pluck('outcome', 'prediction_id');
        return view('per-match-result.match', $data);
    }

    public function save(Request $request)
    {

    }
}
