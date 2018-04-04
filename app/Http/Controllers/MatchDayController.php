<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Day;
use App\MatchDay;
use App\Team;
use App\Match;

class MatchDayController extends Controller
{
    public function index() 
    {
    	$days = Day::all()->pluck('day', 'id');
    	if (! empty($days) && count($days)){
	    	$currentDayMatchCount = [];
	    	$currentDayMatches = [];
	    	foreach ($days as $key => $day) {
	    		$currentDayMatchCount[$key] = MatchDay::where('day_id', $key)->count();
	    		$currentDayMatches[$key] = MatchDay::where('day_id', $key)->pluck('match_id');
	    	}
	    	$matches = Match::all()->keyBy('id'); 
	    	$teams = Team::all()->pluck('name', 'id');
    	}
        return view('match-day.list', compact('days', 'currentDayMatches', 'currentDayMatchCount', 'matches', 'teams'));
    }

    public function create(Day $day)
    {
        $currentMatchesCount = MatchDay::where('day_id', $day->id)->count();
        $currentMatches = MatchDay::where('day_id', $day->id)->pluck('match_id');

        $usedMatchIds = MatchDay::all()->pluck('match_id');
        $freeMatches = Match::select()->whereNotIn('id', $usedMatchIds)->get()->keyBy('id');


        $allMatches = Match::all()->keyBy('id');
        $teams = Team::all()->pluck('name', 'id');

               
        return view('match-day.form', compact(
        	'currentMatchesCount', 
        	'currentMatches',
        	'freeMatches',
        	'allMatches', 
        	'teams'
        ));
    }
}
