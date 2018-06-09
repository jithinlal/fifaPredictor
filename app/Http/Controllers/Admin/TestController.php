<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Team;
use App\UserMatchPrediction;
use App\BonusPoint;
use App\Meliorate;

use \stdClass;

class TestController extends Controller
{
    private $_admins = [11, 12];

    public function index()
    {


        //-------------------------------------------------
        $allTeams = Team::all()->pluck('name', 'id');

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

        $query->whereNotIn('users.id', $this->_admins);

        $rows = $query->get();

        foreach ($rows as $row) {
            if ($row->nonBonusPoints == null) {
                $row->nonBonusPoints = 0;
            }

            $bonusPoints = BonusPoint::userBonusPoints($row->id);
            $row->bonusPoints = $bonusPoints;

            $row->favTeamName = 'None';
            if ($row->fav_team_id) {
                $row->favTeamName = $allTeams[$row->fav_team_id];
            }

            $row->points = $row->nonBonusPoints + $bonusPoints;

            if ($row->points == null) {
                $row->points = 0;
            }
        }
        $sortedRows = $rows->sortBy('points', SORT_REGULAR, true)->sortBy('name');

        $result = [];
        foreach ($sortedRows as $sortedRow) {
            $result[] = $sortedRow;
        }

        dd($result);


        //-------------------------------------------------

        $data = [];
        $data['matchId'] = 1;
        return view('test.index', $data);


    }

    public function save(Request $request)
    {

    }
}
