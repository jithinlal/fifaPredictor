<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

use App\Prediction;
use App\Team;
use App\Result;
use App\UserMatchPrediction;

class OverallResultController extends Controller
{
    public function index()
    {
        $overallPredictions = Prediction::where('type', 'overall')->get();
        $teams = Team::all();
        $players = '';
        $goalkeepers = '';
        $youngPlayers = '';
        $groups = [
            'A' => Team::where('group_name', 'A')->get(),
            'B' => Team::where('group_name', 'B')->get(),
            'C' => Team::where('group_name', 'C')->get(),
            'D' => Team::where('group_name', 'D')->get(),
            'E' => Team::where('group_name', 'E')->get(),
            'F' => Team::where('group_name', 'F')->get(),
            'G' => Team::where('group_name', 'G')->get(),
            'H' => Team::where('group_name', 'H')->get(),
        ];

        $currentPredictions = Result::where('match_id', 0)->pluck('outcome', 'prediction_id')->toArray();

        return view('overall-result.list', compact('overallPredictions', 'teams', 'currentPredictions', 'groups'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'outcome' => 'required',
        ]);

        $where = [
            ['match_id', '=', 0],
            ['prediction_id', '=', $request->prediction_id]
        ];

        $deletedRows = Result::where($where)->delete();

        $insertedRow = Result::create(['match_id' => 0, 'prediction_id' => $request->prediction_id, 'outcome' => $request->outcome]);
        
        //----------------Do for all users with loading circle----------

        $requiredUserOverallPredictionIds = UserMatchPrediction::where($where)->get()->pluck('id');
        foreach ($requiredUserOverallPredictionIds as $requiredUserOverallPredictionId) {
            $userPrediction = UserMatchPrediction::find($requiredUserOverallPredictionId);
            $predictionResult = $insertedRow;
            $prediction = Prediction::find($request->prediction_id);
            if ($userPrediction->prediction === $predictionResult->outcome) {
                $userPrediction->pointsObtained = $prediction->plus;
            } else {
                $userPrediction->pointsObtained = $prediction->minus * -1;
            }
            $userPrediction->save();
        }

        //---------------------------------------------------------------

        Session::flash('alert-success', 'Result Added and Points updated for all Users');

        return redirect('/admin/overall-result');
    }
}
