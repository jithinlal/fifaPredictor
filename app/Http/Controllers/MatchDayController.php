<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
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
        $currentMatchIds = MatchDay::where('day_id', $day->id)->pluck('match_id');
        $currentMatches = Match::select()->whereIn('id', $currentMatchIds)->get()->keyBy('id');

        $usedMatchIds = MatchDay::all()->pluck('match_id');
        $freeMatches = Match::select()->whereNotIn('id', $usedMatchIds)->get()->keyBy('id');
        $freeMatches = $freeMatches->sortBy('date');


        $allMatches = Match::orderBy('date');
        $teams = Team::all()->pluck('name', 'id');

        return view('match-day.form', compact(
        	'currentMatchesCount', 
        	'currentMatches',
        	'freeMatches',
        	'allMatches', 
        	'teams',
            'day'
        ));
    }

    public function save(Request $request, Day $day)
    {  
        $request->validate([
            'day_matches' => 'required',
        ]);
        foreach ($request->day_matches as $key => $match_id) {
            MatchDay::create(['day_id' => $day->id, 'match_id' => $match_id]);
        }
        Session::flash('alert-success', 'Matches added to ' . $day->day);
        return redirect('/match-days/add/' . $day->id);
    }   


    public function delete(Request $request, Day $day, Match $match, $from)
    {  
       
        $matchDays = DB::table('match_days')
                ->where('day_id', $day->id)
                ->where('match_id', $match->id)
                ->get();

        if (! count($matchDays)) {
            Session::flash('alert-danger', 'Invalid Request');
            return redirect('/match-days/add/' . $day->id);
        }

        $deletedRows = MatchDay::where('day_id', $day->id)->whereIn('match_id', [$match->id])->delete();

        Session::flash('alert-success', 'Match deleted From ' . $day->day);
        if ('main' == $from) {
            return redirect('/match-days');
        } else {
            return redirect('/match-days/add/' . $day->id);
        } 
        
    }    
}
