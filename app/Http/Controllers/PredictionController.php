<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PredictionController extends Controller
{
    public function index(Request $request)
    {
        DB::table('user_match_predictions')->insert([
            'user_id' => Auth::id(),
            'match_id' => $request->match_id,
            'prediction_id' => $request->prediction_id,
            'prediction' =>$request->prediction
        ]);

        return response()->json($request);
    }
}
