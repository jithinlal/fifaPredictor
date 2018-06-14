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
        dd(\App\Meliorate::isFirstDay());

        $email = "sanath@softwareassociates.in";
        $domain_name = substr(strrchr($email, "@"), 1);
        echo "Domain name is :" . $domain_name;
        exit;

        //-------------------------------------------------

        $data = [];
        $data['matchId'] = 1;
        return view('test.index', $data);


    }

    public function save(Request $request)
    {

    }
}
