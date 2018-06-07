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
		if ($request->ajax()) {
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

	public function withBonusPoints(Request $request)
	{
		$query = DB::table('users')
			->leftJoin('user_match_predictions', 'users.id', '=', 'user_match_predictions.user_id');

		$query->select(
			'users.id AS id',
			'users.name',
			'users.user_uid',
			'users.sa_user',
			'users.email',
			'users.image_url',
			'users.fav_team_id',

			DB::raw('sum(user_match_predictions.pointsObtained) AS nonBonusPoints')
		);
		$query->groupBy('users.id');

		$rows = $query->get();

		foreach ($rows as $row) {
			$bonusPoints = BonusPoint::userBonusPoints($row->id);
			$row->bonusPoints = $bonusPoints;
			$row->totalPoints = $row->nonBonusPoints + $bonusPoints;
		}
		$sortedRows = $rows->sortBy('totalPoints', SORT_REGULAR, true)->sortBy('name');

		$result = [];
		foreach ($sortedRows as $sortedRow) {
			$result[] = $sortedRow;
		}

		return response()->json(['result' => $result]);
	}

	public function saUsers(Request $request)
	{
		$query = DB::table('users')
			->leftJoin('user_match_predictions', 'users.id', '=', 'user_match_predictions.user_id');

		$query->select(
			'users.id AS id',
			'users.name',
			'users.sa_user',
			'users.user_uid',
			'users.email',
			'users.image_url',
			'users.fav_team_id',

			DB::raw('sum(user_match_predictions.pointsObtained) AS nonBonusPoints')
		);

		$query->groupBy('users.id');

		$query->where('users.sa_user', 1);

		$rows = $query->get();

		foreach ($rows as $row) {
			$bonusPoints = BonusPoint::userBonusPoints($row->id);
			$row->bonusPoints = $bonusPoints;
			$row->totalPoints = $row->nonBonusPoints + $bonusPoints;
		}
		$sortedRows = $rows->sortBy('totalPoints', SORT_REGULAR, true)->sortBy('name');

		$result = [];
		foreach ($sortedRows as $sortedRow) {
			$result[] = $sortedRow;
		}

		return response()->json(['result' => $result]);
	}

	public function favTeamWise(Request $request)
	{
		//-----------------------------------------------
		$teamId = $request->teamId;
		//-----------------------------------------------

		$query = DB::table('users')
			->leftJoin('user_match_predictions', 'users.id', '=', 'user_match_predictions.user_id');

		$query->select(
			'users.id AS id',
			'users.name',
			'users.sa_user',
			'users.user_uid',
			'users.email',
			'users.image_url',
			'users.fav_team_id',

			DB::raw('sum(user_match_predictions.pointsObtained) AS nonBonusPoints')
		);

		$query->groupBy('users.id');

		$query->where('users.fav_team_id', $teamId);

		$rows = $query->get();

		foreach ($rows as $row) {
			$bonusPoints = BonusPoint::userBonusPoints($row->id);
			$row->bonusPoints = $bonusPoints;
			$row->totalPoints = $row->nonBonusPoints + $bonusPoints;
		}
		$sortedRows = $rows->sortBy('totalPoints', SORT_REGULAR, true)->sortBy('name');

		$result = [];
		foreach ($sortedRows as $sortedRow) {
			$result[] = $sortedRow;
		}

		return response()->json(['result' => $result]);
	}
}
