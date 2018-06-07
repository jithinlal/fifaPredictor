<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;
use App\UserMatchPrediction;
use App\BonusPoint;
use App\Meliorate;

use \stdClass;

class TestController extends Controller
{

    public function index()
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

        dd($result);

        $data = [];
        $data['matchId'] = 1;
        return view('test.index', $data);
    }

    public function save(Request $request)
    {

    }
}
