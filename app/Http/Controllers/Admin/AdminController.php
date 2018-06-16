<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\UserMatchPrediction;
use App\User;
use App\Team;

class AdminController extends Controller
{
    const ADMINS = [1, 2];
    /*
        Available Colors
        colors: {
            lightBlue: "#3c8dbc",
            red: "#f56954",
            green: "#00a65a",
            aqua: "#00c0ef",
            yellow: "#f39c12",
            blue: "#0073b7",
            navy: "#001F3F",
            teal: "#39CCCC",
            olive: "#3D9970",
            lime: "#01FF70",
            orange: "#FF851B",
            fuchsia: "#F012BE",
            purple: "#8E24AA",
            maroon: "#D81B60",
            black: "#222222",
            gray: "#d2d6de"
        },

     */

    public function index()
    {
        $data = [];

        $data['allTeams'] = Team::all()->pluck('name', 'id');
        $data['totalUserCount'] = User::whereNotIn('id', self::ADMINS)->count();
        $data['saUserCount'] = User::where('sa_user', 1)->count();
        $data['totalPredictionCount'] = UserMatchPrediction::count();
        $data['overallPredictions'] = UserMatchPrediction::where('match_id', 0)->count();
        $data['perMatchPredictions'] = UserMatchPrediction::whereNotIn('match_id', [0])->count();
        if ($data['totalUserCount'] != 0) {
            $data['predictionPerMatch'] = $data['overallPredictions'] / $data['totalUserCount'];
        }
        $data['mostFans'] = $this->_getMostSupportedThreeTeams();

        return view('admin.index', $data);
    }

    private function _getMostSupportedThreeTeams()
    {
        $query = DB::table('users');

        $query->select(

            DB::raw('count(users.id) AS userCount'),
            'users.fav_team_id'
        );
        $query->groupBy('users.fav_team_id');

        $query->orderBy('userCount', 'desc');

        $query->limit(3);

        return $query->get();
    }
}
