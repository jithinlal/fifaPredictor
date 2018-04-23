<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Team;
use App\Stadium;

class MatchController extends Controller
{
    public function show($id)
    {
        $match = Match::find($id);
        $teams = Team::all();
        $stadia = Stadium::all();
        return view('match.show', ['match' => $match,'teams' => $teams, 'stadia' => $stadia]);
    }
}
