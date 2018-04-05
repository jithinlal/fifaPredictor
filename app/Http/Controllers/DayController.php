<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Day;
use App\MatchDay;
use Session;
use \Datetime;
use \DatePeriod;
use \DateInterval;

class DayController extends Controller
{
	const MIN_DAY = '2018-06-14';
	const MAX_DAY = '2018-07-15';

	public function create() 
    {
        $days = [];
        $begin = new DateTime(self::MIN_DAY);
        $end = new DateTime(self::MAX_DAY);
        $end->modify( '+1 day' );

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval, $end);

        foreach($daterange as $date){
            $days[] = $date->format('Y-m-d');
        }

    	$selectedDays = Day::all()->pluck('day')->toArray();
        return view('day.form', compact('days', 'selectedDays'));
    }

    public function save(Request $request)
    {   
        $request->validate([
            'days' => 'required',
        ]);

        Day::truncate();
    	MatchDay::truncate();

        foreach ($request->days as $key => $day) {   
        	Day::create(['day' => $day]);
        }

        Session::flash('alert-success', 'Match Days Created. Add Matches here');
        
        return redirect('/match-days');
    }    
}
