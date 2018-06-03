<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function allTime(Request $request)
    {
    	if($request->ajax()){
    		$result = DB::table('user_match_predictions')
    			->selectRaw('user_id, sum(pointsObtained)')
    			->groupBy('user_id')
    			->orderByRaw('sum(pointsObtained) DESC')->get()->toArray();

    		return response()->json(['result' => $result]);
    	}
    }
}
