<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Team;
use App\Day;
use App\MatchDay;
use App\UserMatchPrediction;
use App\BonusPoint;
use App\Meliorate;

use \stdClass;
use DateTime;

class TestController extends Controller
{
    private $_admins = [1, 2];
    const MYSQL_DATE = 'Y-m-d';

    public function index()
    {
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
        dd($rows);

        //-------------------------------------------------

        $data = [];
        $data['matchId'] = 1;
        return view('test.index', $data);


    }

    public function save(Request $request)
    {

    }
}
