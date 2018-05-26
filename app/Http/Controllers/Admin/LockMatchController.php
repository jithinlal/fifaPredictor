<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session;

use App\Http\Controllers\Controller;

use App\Match;
use App\Team;

use App\Meliorate;

class LockMatchController extends Controller
{
    public function index()
    {
        $match1 = Match::find(1);
        $lockGap = Meliorate::findTimeDiffInMin($match1->date, $match1->lock_time);

        $matches = Match::select('id', 'home_team', 'away_team', 'date', 'lock_time')->get();

        $data = [];
        $data['matches'] = $matches;
        $data['teams'] = Team::all()->pluck('name', 'id');
        $data['gap'] = $lockGap;
        $data['avaialableLockTimeOptions'] = Meliorate::availableLockTimes();

        return view('lock-match.set-lock-time', $data);
    }

    public function save(Request $request)
    {
        $request->validate([
            'lockTimeMinutes' => 'required|not_in:0',
        ]);

        $match1 = Match::find(1);
        $lockGap = Meliorate::findTimeDiffInMin($match1->date, $match1->lock_time);

        if ($lockGap == $request->lockTimeMinutes) {
            Session::flash('alert-danger', 'Lock Time gap of ' . $lockGap . ' minutes already added');
            return redirect('/admin/lock-match');
        }

        $allMatches = Match::all();

        $count = 0;
        foreach ($allMatches as $match) {
            $match->lock_time = Meliorate::subtractMinutesFromTime($match->date, $request->lockTimeMinutes);
            $match->save();
            $count++;
        }

        Session::flash('alert-success', 'Lock Time gap of ' . $request->lockTimeMinutes . ' Minutes Added to ' . $count . ' Matches');
        return redirect('/admin/lock-match');
    }
}
