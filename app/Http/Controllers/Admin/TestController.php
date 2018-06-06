<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\BonusPoint;
use App\Meliorate;

class TestController extends Controller
{

    public function index()
    {

        $test = BonusPoint::userMatchFavTeamResultPoints(Auth::id(), 1);

        $test1 = Meliorate::currentLockTimeGap();

        
        //dd($test1);



        $data = [];
        $data['matchId'] = 1;
        return view('test.index', $data);
    }

    public function save(Request $request)
    {

    }
}
