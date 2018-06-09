<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Match;
use App\Team;
use App\Meliorate;
use App\BonusPoint;

class PowerTeamController extends Controller
{
    const DRAW_STATUS = 'draw';
    const WIN_STATUS = 'win';
    const LOSS_STATUS = 'lost';

    public function list()
    {
        $data = [];

        $query = DB::table('teams')
            ->leftJoin('bonus_points', 'teams.id', '=', 'bonus_points.team_id');

        $query->select(
            'teams.id AS id',
            'teams.name',
            'teams.group_name',
            'teams.iso2',

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
            if ($row->goalsScored == null) {
                $row->goalsScored = 0;
            }
            if ($row->points_goals_scored == null) {
                $row->points_goals_scored = 0;
            }
            if ($row->result_point == null) {
                $row->result_point = 0;
            }
            $row->supporterCount = Meliorate::getSupportingUserCount($row->id);
            $row->winCount = BonusPoint::getMatchesWonCount($row->id);
            $row->lossCount = BonusPoint::getMatchesLostCount($row->id);
            $row->drawCount = BonusPoint::getMatchesDrawnCount($row->id);
        }

        $data['sortedTeams'] = $sortedRows;
        $data['userFavTeamId'] = BonusPoint::getFavTeamId(Auth::id());
        return view('power-rankings', $data);
    }
}
