<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Day;
use \Datetime;
use Session;

class DayController extends Controller
{
	const MIN_DAY = '2018-06-14';
	const MAX_DAY = '2018-07-15';

	public function create() 
    {
    	$days = [];
    	$day = new DateTime(self::MIN_DAY);
    	$maxDay = new DateTime(self::MAX_DAY);


    	while ($day <= $maxDay) {  
    		$days[] = $day->format('Y-m-d');
			$day->modify('+1 day');			
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

        foreach ($request->days as $key => $day) {   
        	Day::create(['day' => $day]);
        }

        Session::flash('alert-success', 'Match Days Created');
        
        return redirect('/days');
    }    
}
