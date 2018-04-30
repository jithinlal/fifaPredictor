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
        $result = DB::table('user_match_predictions')->where([['user_id',Auth::id()],['match_id',0]])->pluck('prediction');

        return response()->json($result);
    }

    public function awayScore(){
    	
    }
}
