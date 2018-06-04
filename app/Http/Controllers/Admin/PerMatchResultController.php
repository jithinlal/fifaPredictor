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
        $allTeams = Team::all()->pluck('name', 'id');
        if ($match->home_team && $match->home_team) {
            $resultOptions = [
                $allTeams[$match->home_team] => $allTeams[$match->home_team],
                $allTeams[$match->away_team] => $allTeams[$match->away_team],
                'draw' => 'Draw',
            ];
        } else {
            $resultOptions = [
                'tba' => 'tba',
                'tba' => 'tba',
                'draw' => 'Draw',
            ];
        }

        $data = [];
        $data['match'] = $match;
        $data['teams'] = $allTeams;
        $data['resultOptions'] = $resultOptions;
        $data['predictions'] = Prediction::where('type', 'group')->get();
        $data['existingPredictions'] = Result::where('match_id', $match->id)->pluck('outcome', 'prediction_id');
        return view('per-match-result.match', $data);
    }

    public function save(Request $request)
    {
        $request->validate([
            'outcome' => 'required',
        ]);

        $matchId = $request->matchId;

        if (-1 == $request->outcome) {
            Session::flash('alert-danger', 'Outcome not selected');
            return redirect('/admin/per-match-result/match/' . $matchId);
        }

        $predictionId = $request->predictionId;
        $where = [
            ['match_id', '=', $matchId],
            ['prediction_id', '=', $predictionId]
        ];
        $deletedRows = Result::where($where)->delete();
        $insertedRow = Result::create(['match_id' => $matchId, 'prediction_id' => $predictionId, 'outcome' => $request->outcome]);

        //----------------Do for all users with loading circle----------

        $requiredUserPerMatchPredictionIds = UserMatchPrediction::where($where)->get()->pluck('id');
        foreach ($requiredUserPerMatchPredictionIds as $requiredUserPerMatchPredictionId) {
            $userPrediction = UserMatchPrediction::find($requiredUserPerMatchPredictionId);
            $predictionResult = $insertedRow;
            $prediction = Prediction::find($predictionId);
            if ($userPrediction->prediction == $predictionResult->outcome) {
                $userPrediction->pointsObtained = $prediction->plus;
            } else {
                $userPrediction->pointsObtained = $prediction->minus * -1;
            }
            $userPrediction->save();
        }


        //--------------------------------------------------------------

        Session::flash('alert-success', 'Result Added and Points updated for all Users');

        return redirect('/admin/per-match-result/match/' . $matchId);

    }

    public function markAsPublished(Request $request)
    {
        $matchId = $request->matchId;
        $resultPublishedStatus = $request->publishResult;

        $match = Match::find($matchId);
        if (1 == $resultPublishedStatus) {
            $match->result_published = 1;
            $match->save();
        } elseif (0 == $resultPublishedStatus) {
            $match->result_published = 0;
            $match->save();
        }

        Session::flash('alert-success', 'Match result_published fiels set as ' . $resultPublishedStatus);
        return redirect('/admin/per-match-result/match/' . $matchId);

    }

}
