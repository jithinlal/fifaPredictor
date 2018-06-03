<?php

namespace App\Http\Controllers;

use App\User;
use \stdClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function allTime(Request $request)
    {
    	$result = [];
    	if($request->ajax()){
    		$query = DB::table('user_match_predictions')
    			->selectRaw('user_id as id, sum(pointsObtained) as points')
    			->groupBy('user_id')
    			->orderByRaw('sum(pointsObtained) DESC')->get()->toArray();

    		foreach ($query as $q) {
    			$user = User::find($q->id);
    			$userName = $user->name;
    			$userEmail = $user->email;
    			$points = $q->points;

    			$obj = new stdClass();
    			$obj->id = $q->id;
    			$obj->name = $userName;
    			$obj->email = $userEmail;
    			$obj->points = $points;
    			$result[] = $obj;
    		}
    		return response()->json(['result' => $result]);
    	}
    }
}
