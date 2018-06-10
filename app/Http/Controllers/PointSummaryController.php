<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Match;
use App\Team;
use App\Meliorate;
use App\BonusPoint;

class PointSummaryController extends Controller
{

    public function list()
    {
        $data = [];
        return view('point-summary', $data);
    }
}
