<?php

namespace App\Http\Controllers;

use \stdClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Team;
use App\BonusPoint;

class ApiController extends Controller
{
	private $_admins = [1, 2];

	public function allTime(Request $request)
	{
		if ($request->ajax()) {
			$allTeams = Team::all()->pluck('name', 'id');

			$query = DB::table('users')
				->leftJoin('user_match_predictions', 'users.id', '=', 'user_match_predictions.user_id');

			$query->select(
				'users.id AS id',
				DB::raw('min(users.name) AS name'),
				DB::raw('min(users.user_uid) AS user_uid'),
				DB::raw('min(users.sa_user) AS sa_user'),
				DB::raw('min(users.email) AS email'),
				DB::raw('min(users.image_url) AS image_url'),
				DB::raw('min(users.fav_team_id) AS fav_team_id'),

				DB::raw('sum(user_match_predictions.pointsObtained) AS nonBonusPoints')
			);
			$query->groupBy('users.id');

			$query->whereNotIn('users.id', $this->_admins);

			$rows = $query->get();

			foreach ($rows as $row) {
				if ($row->nonBonusPoints == null) {
					$row->nonBonusPoints = 0;
				}

				$bonusPoints = BonusPoint::userBonusPoints($row->id);
				$row->bonusPoints = $bonusPoints;

				$row->points = $row->nonBonusPoints + $bonusPoints;

				$row->favTeamName = 'None';
				if ($row->fav_team_id) {
					$row->favTeamName = $allTeams[$row->fav_team_id];
				}

				if ($row->points == null) {
					$row->points = 0;
				}
			}
			$sortedRows = $rows->sortByDesc('points');

			$result = [];
			foreach ($sortedRows as $sortedRow) {
				$result[] = $sortedRow;
			}

			return response()->json(['result' => $result]);
		}
	}

	public function nonBonus(Request $request)
	{
		if ($request->ajax()) {
			$allTeams = Team::all()->pluck('name', 'id');
			$query = DB::table('users')
				->leftJoin('user_match_predictions', 'users.id', '=', 'user_match_predictions.user_id');

			$query->select(
				'users.id AS id',
				DB::raw('min(users.name) AS name'),
				DB::raw('min(users.user_uid) AS user_uid'),
				DB::raw('min(users.sa_user) AS sa_user'),
				DB::raw('min(users.email) AS email'),
				DB::raw('min(users.image_url) AS image_url'),
				DB::raw('min(users.fav_team_id) AS fav_team_id'),

				DB::raw('sum(user_match_predictions.pointsObtained) AS points')
			);
			$query->groupBy('users.id');

			$query->whereNotIn('users.id', $this->_admins);

			$rows = $query->get();

			foreach ($rows as $row) {
				if ($row->points == null) {
					$row->points = 0;
				}

				$row->favTeamName = 'None';
				if ($row->fav_team_id) {
					$row->favTeamName = $allTeams[$row->fav_team_id];
				}
			}
			$sortedRows = $rows->sortByDesc('points');

			$result = [];
			foreach ($sortedRows as $sortedRow) {
				$result[] = $sortedRow;
			}

			return response()->json(['result' => $result]);
		}
	}

	public function saUser(Request $request)
	{
		if ($request->ajax()) {
			$allTeams = Team::all()->pluck('name', 'id');
			$query = DB::table('users')
				->leftJoin('user_match_predictions', 'users.id', '=', 'user_match_predictions.user_id');

			$query->select(
				'users.id AS id',
				DB::raw('min(users.name) AS name'),
				DB::raw('min(users.user_uid) AS user_uid'),
				DB::raw('min(users.sa_user) AS sa_user'),
				DB::raw('min(users.email) AS email'),
				DB::raw('min(users.image_url) AS image_url'),
				DB::raw('min(users.fav_team_id) AS fav_team_id'),

				DB::raw('sum(user_match_predictions.pointsObtained) AS nonBonusPoints')
			);

			$query->groupBy('users.id');

			$query->where('users.sa_user', 1);

			$query->whereNotIn('users.id', $this->_admins);

			$rows = $query->get();

			foreach ($rows as $row) {
				if ($row->nonBonusPoints == null) {
					$row->nonBonusPoints = 0;
				}

				$bonusPoints = BonusPoint::userBonusPoints($row->id);
				$row->bonusPoints = $bonusPoints;

				$row->points = $row->nonBonusPoints + $bonusPoints;

				$row->favTeamName = 'None';
				if ($row->fav_team_id) {
					$row->favTeamName = $allTeams[$row->fav_team_id];
				}

				if ($row->points == null) {
					$row->points = 0;
				}
			}
			$sortedRows = $rows->sortByDesc('points');

			$result = [];
			foreach ($sortedRows as $sortedRow) {
				$result[] = $sortedRow;
			}

			return response()->json(['result' => $result]);
		}
	}

	public function favTeam(Request $request)
	{
		if ($request->ajax()) {
			$allTeams = Team::all()->pluck('name', 'id');
			//$teamId = 2;
			$teamId = $request->teamId;
			//-----------------------------------------------

			$query = DB::table('users')
				->leftJoin('user_match_predictions', 'users.id', '=', 'user_match_predictions.user_id');

			$query->select(
				'users.id AS id',
				DB::raw('min(users.name) AS name'),
				DB::raw('min(users.user_uid) AS user_uid'),
				DB::raw('min(users.sa_user) AS sa_user'),
				DB::raw('min(users.email) AS email'),
				DB::raw('min(users.image_url) AS image_url'),
				DB::raw('min(users.fav_team_id) AS fav_team_id'),

				DB::raw('sum(user_match_predictions.pointsObtained) AS nonBonusPoints')
			);

			$query->groupBy('users.id');

			$query->where('users.fav_team_id', $teamId);

			$query->whereNotIn('users.id', $this->_admins);

			$rows = $query->get();

			foreach ($rows as $row) {
				if ($row->nonBonusPoints == null) {
					$row->nonBonusPoints = 0;
				}

				$bonusPoints = BonusPoint::userBonusPoints($row->id);
				$row->bonusPoints = $bonusPoints;

				$row->points = $row->nonBonusPoints + $bonusPoints;

				$row->favTeamName = 'None';
				if ($row->fav_team_id) {
					$row->favTeamName = $allTeams[$row->fav_team_id];
				}

				if ($row->points == null) {
					$row->points = 0;
				}
			}
			$sortedRows = $rows->sortByDesc('points');

			$result = [];
			foreach ($sortedRows as $sortedRow) {
				$result[] = $sortedRow;
			}

			return response()->json(['result' => $result]);
		}

	}

	public function allTeams(Request $request)
	{
		if ($request->ajax()) {
			$query = DB::table('teams')
				->leftJoin('bonus_points', 'teams.id', '=', 'bonus_points.team_id');

			$query->select(
				'teams.id AS id',
				DB::raw('min(teams.name) AS name'),
				DB::raw('min(teams.group_name) AS group_name'),
				DB::raw('min(teams.iso2) AS iso2'),

				DB::raw('sum(bonus_points.goals_scored) AS goalsScored'),
				DB::raw('sum(bonus_points.points_goals_scored) AS points_goals_scored'),
				DB::raw('sum(bonus_points.result_point) AS result_point'),
				DB::raw('sum(bonus_points.total_point) AS points')
			);
			$query->groupBy('teams.id');

			$query->orderBy('points', 'desc');
			$query->orderBy('name');

			$sortedRows = $query->get();

			foreach ($sortedRows as $row) {
				if ($row->points == null) {
					$row->points = 0;
				}
			}

			return response()->json(['result' => $sortedRows]);
		}
	}

	private function _isAdmin($userId)
	{
		return in_array($userId, $this->_admins);
	}
}
