<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

use App\Prediction;
use App\Team;
use App\Day;
use App\Match;
use App\MatchDay;
use App\Result;
use App\UserMatchPrediction;
use App\BonusPoint;

class PerMatchResultController extends Controller
{
    const BONUS_POINT_VICTORY = 100;
    const BONUS_POINT_LOSS = -100;
    const BONUS_POINT_DRAW = 30;
    const BONUS_POINT_PER_GOAL = 10;

    const DRAW_STATUS = 'draw';
    const WIN_STATUS = 'win';
    const LOSS_STATUS = 'loss';

    public function index()
    {
        $days = Day::all()->pluck('day', 'id');
        if (!empty($days) && count($days)) {
            $currentDayMatchCount = [];
            $currentDayMatches = [];
            foreach ($days as $key => $day) {
                $currentDayMatchCount[$key] = MatchDay::where('day_id', $key)->count();
                $currentDayMatches[$key] = MatchDay::where('day_id', $key)->pluck('match_id');
            }
            $matches = Match::all()->keyBy('id');
            $teams = Team::all()->pluck('name', 'id');
        }
        return view('per-match-result.list', compact('days', 'currentDayMatches', 'currentDayMatchCount', 'matches', 'teams'));
        //return view('per-match-result.list', $data);
    }

    public function match(Match $match)
    {
        $allTeams = Team::all()->pluck('name', 'id');
        if ($match->home_team && $match->home_team) {
            $resultOptions = [
                $allTeams[$match->home_team] => $allTeams[$match->home_team],
                $allTeams[$match->away_team] => $allTeams[$match->away_team],
                'draw' => 'Draw',
            ];
        } else {
            $resultOptions = [
                'tba' => 'tba',
                'tba' => 'tba',
                'draw' => 'Draw',
            ];
        }

        $data = [];
        $data['match'] = $match;
        $data['teams'] = $allTeams;
        $data['resultOptions'] = $resultOptions;
        $data['predictions'] = Prediction::where('type', 'group')->get();
        $data['existingPredictions'] = Result::where('match_id', $match->id)->pluck('outcome', 'prediction_id');
        return view('per-match-result.match', $data);
    }

    public function save(Request $request)
    {
        $request->validate([
            'outcome' => 'required',
        ]);

        $matchId = $request->matchId;
        $predictionId = $request->predictionId;

        if (-1 == $request->outcome) {
            Session::flash('alert-danger', 'Outcome not selected');
            return redirect('/admin/per-match-result/match/' . $matchId);
        }

        $where = [
            ['match_id', '=', $matchId],
            ['prediction_id', '=', $predictionId]
        ];
        $deletedRows = Result::where($where)->delete();
        $insertedRow = Result::create(['match_id' => $matchId, 'prediction_id' => $predictionId, 'outcome' => $request->outcome]);

        $prediction = Prediction::find($predictionId);

        if ($prediction->name = 'Result') {
            $this->_populateResultPredictions($matchId);
        }

        $this->_calculateUserMatchPoints($prediction, $where, $insertedRow);

        Session::flash('alert-success', 'Result Added and Points updated for all Users');

        return redirect('/admin/per-match-result/match/' . $matchId);

    }

    public function markAsPublished(Request $request)
    {
        $matchId = $request->matchId;
        $resultPublishedStatus = $request->publishResult;

        $match = Match::find($matchId);
        if (1 == $resultPublishedStatus) {
            $match->result_published = 1;
            $match->save();
        } elseif (0 == $resultPublishedStatus) {
            $match->result_published = 0;
            $match->save();
        }

        Session::flash('alert-success', 'Match result_published fiels set as ' . $resultPublishedStatus);
        return redirect('/admin/per-match-result/match/' . $matchId);
    }

    public function bonusPoints(Request $request)
    {

        $matchId = $request->matchId;
        BonusPoint::where('match_id', $matchId)->delete();
        $match = Match::find($matchId);
        $allTeams = Team::all()->pluck('name', 'id');

        $homeTeamWhere = [
            ['match_id', '=', $matchId],
            ['prediction_id', '=', 17]
        ];

        $awayTeamWhere = [
            ['match_id', '=', $matchId],
            ['prediction_id', '=', 18]
        ];

        $homeTeamGoals = Result::where($homeTeamWhere)->value('outcome');
        $homeTeamId = $match->home_team;
        $homeTeamName = $allTeams[$homeTeamId];

        $awayTeamGoals = Result::where($awayTeamWhere)->value('outcome');
        $awayTeamId = $match->away_team;
        $awayTeamName = $allTeams[$awayTeamId];

        $resultWhere = [
            ['match_id', '=', $matchId],
            ['prediction_id', '=', 23]
        ];
        $result = Result::where($resultWhere)->value('outcome');

        if ('draw' == $result) {
            $homeTeamVictoryPoints = self::BONUS_POINT_DRAW;
            $homeTeamVictoryStatus = self::DRAW_STATUS;

            $awayTeamVictoryPoints = self::BONUS_POINT_DRAW;
            $awayTeamVictoryStatus = self::DRAW_STATUS;
        } else {
            if ($result == $homeTeamName) {
                $homeTeamVictoryPoints = self::BONUS_POINT_VICTORY;
                $homeTeamVictoryStatus = self::WIN_STATUS;

                $awayTeamVictoryPoints = self::BONUS_POINT_LOSS;
                $awayTeamVictoryStatus = self::LOSS_STATUS;
            } elseif ($result == $awayTeamName) {
                $awayTeamVictoryPoints = self::BONUS_POINT_VICTORY;
                $awayTeamVictoryStatus = self::WIN_STATUS;

                $homeTeamVictoryPoints = self::BONUS_POINT_LOSS;
                $homeTeamVictoryStatus = self::LOSS_STATUS;
            }
        }

        $array1 = [
            'match_id' => $matchId,
            'team_id' => $homeTeamId,
            'goals_scored' => $homeTeamGoals,
            'points_goals_scored' => $homeTeamGoals * self::BONUS_POINT_PER_GOAL,
            'result' => $homeTeamVictoryStatus,
            'result_point' => $homeTeamVictoryPoints,
            'total_point' => $homeTeamGoals * self::BONUS_POINT_PER_GOAL + $homeTeamVictoryPoints
        ];

        $array2 = [
            'match_id' => $matchId,
            'team_id' => $awayTeamId,
            'goals_scored' => $awayTeamGoals,
            'points_goals_scored' => $awayTeamGoals * self::BONUS_POINT_PER_GOAL,
            'result' => $awayTeamVictoryStatus,
            'result_point' => $awayTeamVictoryPoints,
            'total_point' => $awayTeamGoals * self::BONUS_POINT_PER_GOAL + $awayTeamVictoryPoints
        ];

        BonusPoint::insert($array1);
        BonusPoint::insert($array2);

        Session::flash('alert-success', 'Bonus Points for ' . $homeTeamName . ' and ' . $awayTeamName . ' Added to bonus_points table in match id: ' . $matchId);

        return redirect('/admin/per-match-result/match/' . $matchId);

    }

    /**
     * Populating 'result' prediction for users who have predicted the scoreline of this match
     * 
     */
    private function _populateResultPredictions($matchId)
    {
        $allTeams = Team::all()->pluck('name', 'id');
        $userIds = UserMatchPrediction::distinct()->pluck('user_id');
        foreach ($userIds as $userId) {
            $userWhere = [
                ['match_id', '=', $matchId],
                ['user_id', '=', $userId],
                ['prediction_id', '<=', 18],
                ['prediction_id', '>=', 17],
            ];
            $alreadyExistsWhere = [
                ['match_id', '=', $matchId],
                ['user_id', '=', $userId],
                ['prediction_id', '=', 23],
            ];
            $isMatchResultFindable = UserMatchPrediction::where($userWhere)->count() == 2;
            $hasPopulatedForUser = UserMatchPrediction::where($alreadyExistsWhere)->count() > 0;
            if ($isMatchResultFindable && !$hasPopulatedForUser) {
                $homeTeamWhere = [
                    ['user_id', '=', $userId],
                    ['match_id', '=', $matchId],
                    ['prediction_id', '=', 17],
                ];
                $userMatchHomeTeamQuery = UserMatchPrediction::where($homeTeamWhere);
                $userMatchHomeTeamGoals = $userMatchHomeTeamQuery->value('prediction');
                $userMatchHomeTeamId = $userMatchHomeTeamQuery->value('team_id');

                $awayTeamWhere = [
                    ['user_id', '=', $userId],
                    ['match_id', '=', $matchId],
                    ['prediction_id', '=', 18],
                ];
                $userMatchAwayTeamQuery = UserMatchPrediction::where($awayTeamWhere);
                $userMatchAwayTeamGoals = $userMatchAwayTeamQuery->value('prediction');
                $userMatchAwayTeamId = $userMatchAwayTeamQuery->value('team_id');

                $result = '';
                if ($userMatchHomeTeamGoals > $userMatchAwayTeamGoals) {
                    $result = $allTeams[$userMatchHomeTeamId];
                } elseif ($userMatchAwayTeamGoals > $userMatchHomeTeamGoals) {
                    $result = $allTeams[$userMatchAwayTeamId];
                } else {
                    $result = 'draw';
                }

                $newUserPrediction = new UserMatchPrediction();
                $newUserPrediction->user_id = $userId;
                $newUserPrediction->match_id = $matchId;
                $newUserPrediction->prediction_id = 23;
                $newUserPrediction->prediction = $result;
                $newUserPrediction->save();

            }
        }
    }

    /**
     * Calculate User Match Points   
     * Do for all users with loading circle
     * 
     */
    private function _calculateUserMatchPoints($prediction, $where, $predictionResult)
    {
        $requiredUserPerMatchPredictionIds = UserMatchPrediction::where($where)->get()->pluck('id');
        foreach ($requiredUserPerMatchPredictionIds as $requiredUserPerMatchPredictionId) {
            $userPrediction = UserMatchPrediction::find($requiredUserPerMatchPredictionId);
            if ($userPrediction->prediction == $predictionResult->outcome) {
                $userPrediction->pointsObtained = $prediction->plus;
            } else {
                $userPrediction->pointsObtained = $prediction->minus * -1;
            }
            $userPrediction->save();
        }
    }

}
