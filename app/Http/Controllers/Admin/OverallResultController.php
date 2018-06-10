<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

use App\Prediction;
use App\Team;
use App\User;
use App\Result;
use App\Player;
use App\UserMatchPrediction;

class OverallResultController extends Controller
{
    public function index()
    {
        $overallPredictions = Prediction::where('type', 'overall')->get();
        $teams = Team::all();
        $players = Player::all();
        $goalkeepers = Player::where('gk', 1)->get();
        $youngPlayers = Player::whereNotNull('age')->where('age', '<', 22)->get();
        $groups = [
            'A' => Team::where('group_name', 'A')->get(),
            'B' => Team::where('group_name', 'B')->get(),
            'C' => Team::where('group_name', 'C')->get(),
            'D' => Team::where('group_name', 'D')->get(),
            'E' => Team::where('group_name', 'E')->get(),
            'F' => Team::where('group_name', 'F')->get(),
            'G' => Team::where('group_name', 'G')->get(),
            'H' => Team::where('group_name', 'H')->get(),
        ];

        $currentPredictions = Result::where('match_id', 0)->pluck('outcome', 'prediction_id')->toArray();
        $currentComments = Result::where('match_id', 0)->pluck('comment', 'prediction_id')->toArray();
        return view('overall-result.list', compact('overallPredictions', 'teams', 'currentPredictions', 'groups', 'currentComments', 'players', 'goalkeepers', 'youngPlayers'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'outcome' => 'required',
        ]);

        $where = [
            ['match_id', '=', 0],
            ['prediction_id', '=', $request->prediction_id]
        ];

        $deletedRows = Result::where($where)->delete();

        $insertedRow = Result::create(['match_id' => 0, 'prediction_id' => $request->prediction_id, 'outcome' => $request->outcome, 'comment' => $request->comment]);
        
        //----------------Do for all users with loading circle----------

        $requiredUserOverallPredictionIds = UserMatchPrediction::where($where)->get()->pluck('id');
        foreach ($requiredUserOverallPredictionIds as $requiredUserOverallPredictionId) {
            $userPrediction = UserMatchPrediction::find($requiredUserOverallPredictionId);
            $predictionResult = $insertedRow;
            $prediction = Prediction::find($request->prediction_id);
            if ($userPrediction->prediction === $predictionResult->outcome) {
                $userPrediction->pointsObtained = $prediction->plus;
            } else {
                $userPrediction->pointsObtained = $prediction->minus * -1;
            }
            $userPrediction->save();
        }

        //---------------------------------------------------------------

        Session::flash('alert-success', 'Result Added and Points updated for all Users');

        return redirect('/admin/overall-result');
    }

    public function semiFinalistsPoints()
    {
        if ($this->_isSemifinalistsPublishedByAdmin()) {
            $semiFinalistPoint = Prediction::where('id', 24)->value('plus');
            $semiFinalists = $this->_getSemiFinalists();
            $userIds = UserMatchPrediction::distinct()->pluck('user_id');
            foreach ($userIds as $userId) {
                if ($this->_hasUserPredictedAllSemifinalists($userId)) {
                    $userSemifinalists = $this->_getUserSemifinalists($userId);
                    $points = 0;
                    $count = 0;
                    foreach ($userSemifinalists as $userSemifinalist) {
                        if (in_array($userSemifinalist, $semiFinalists)) {
                            $points += $semiFinalistPoint;
                            $count++;
                        }
                    }

                    UserMatchPrediction::where('user_id', $userId)->where('prediction_id', 24)->delete();

                    $newUserPrediction = new UserMatchPrediction();
                    $newUserPrediction->user_id = $userId;
                    $newUserPrediction->match_id = 0;
                    $newUserPrediction->prediction_id = 24;
                    $newUserPrediction->prediction = $count;
                    $newUserPrediction->pointsObtained = $points;
                    $newUserPrediction->save();
                }
            }
            Session::flash('alert-success', 'Added points for all users who have predicted all four semifinalists and got some of them right irrespective of the order');
            return redirect('/admin/overall-result');

        } else {
            Session::flash('alert-warning', 'Please Wait till Semi Finalists are announced');
            return redirect('/admin/overall-result');
        }
    }

    private function _isSemifinalistsPublishedByAdmin()
    {
        return Result::where('match_id', 0)->whereIn('prediction_id', [1, 2, 3, 4])->count() == 4;
    }

    private function _getSemiFinalists()
    {
        return Result::where('match_id', 0)->whereIn('prediction_id', [1, 2, 3, 4])->pluck('outcome')->toArray();
    }

    private function _hasUserPredictedAllSemifinalists($userId)
    {
        return UserMatchPrediction::where('match_id', 0)->where('user_id', $userId)->whereIn('prediction_id', [1, 2, 3, 4])->count() == 4;
    }

    private function _getUserSemifinalists($userId)
    {
        return UserMatchPrediction::where('match_id', 0)->where('user_id', $userId)->whereIn('prediction_id', [1, 2, 3, 4])->pluck('prediction')->toArray();
    }


}
