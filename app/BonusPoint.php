<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Team;
use App\Match;

class BonusPoint extends Model
{
    //protected $fillable = ['match_id', 'day_id'];

    const ADMINS = [1, 2];
    const DRAW_STATUS = 'draw';
    const WIN_STATUS = 'win';
    const LOSS_STATUS = 'lost';

    /**
     * Get User Fav team Id
     * 
     */
    public static function getFavTeamId($userId)
    {
        return User::find($userId)->value('fav_team_id');
    }

    /**
     * Get User Fav team Name
     * 
     */
    public static function getFavTeamName($userId)
    {
        $allTeams = Team::all()->pluck('name', 'id');
        return $allTeams[self::getFavTeamId($userId)];
    }

    /**
     * Bonus Points earned by team victories and goals scored
     * 
     */
    public static function teamBonusPoints($teamId)
    {
        return self::where('team_id', $teamId)->sum('total_point');
    }

    /**
     * Bonus Points earned by user via his Favourite teams victories and goals scored
     * 
     */
    public static function userBonusPoints($userId)
    {
        $favTeamId = self::getFavTeamId($userId);
        return self::where('team_id', $favTeamId)->sum('total_point');
    }


    /**
     * Is user's fav team a part of this match
     * 
     */
    public static function isFavTeamPlaying($userId, $matchId)
    {
        $favTeamId = self::getFavTeamId($userId);
        $match = Match::find($matchId);
        return in_array($favTeamId, [$match->home_team, $match->away_team]);
    }

    /**
     * Bonus Points earned by a user in a specific match
     * 
     */
    public static function userMatchBonusPoints($userId, $matchId)
    {
        $favTeamId = self::getFavTeamId($userId);
        $where = [
            ['team_id', $favTeamId],
            ['match_id', $matchId]
        ];
        return self::where($where)->value('total_point');
    }

    /**
     * Goals scored by user's fav team
     * 
     */
    public static function userMatchFavTeamGoals($userId, $matchId)
    {
        $favTeamId = self::getFavTeamId($userId);
        $where = [
            ['team_id', $favTeamId],
            ['match_id', $matchId]
        ];
        return self::where($where)->value('goals_scored');
    }

    /**
     * Points got by Goals scored by user's fav team
     * 
     */
    public static function userMatchFavTeamGoalsPoints($userId, $matchId)
    {
        $favTeamId = self::getFavTeamId($userId);
        $where = [
            ['team_id', $favTeamId],
            ['match_id', $matchId]
        ];
        return self::where($where)->value('points_goals_scored');
    }

    /**
     * Won or Loss or Draw
     * 
     */
    public static function userMatchFavTeamResult($userId, $matchId)
    {
        $favTeamId = self::getFavTeamId($userId);
        $where = [
            ['team_id', $favTeamId],
            ['match_id', $matchId]
        ];
        return self::where($where)->value('result');
    }

    /**
     * Points got by user's fav team Won or Loss or Draw
     * 
     */
    public static function userMatchFavTeamResultPoints($userId, $matchId)
    {
        $favTeamId = self::getFavTeamId($userId);
        $where = [
            ['team_id', $favTeamId],
            ['match_id', $matchId]
        ];
        return self::where($where)->value('result_point');
    }

    /**
     * Get Number of matches won
     * 
     */
    public static function getMatchesWonCount($teamId)
    {
        return self::where('result', self::WIN_STATUS)->where('team_id', $teamId)->count();
    }

    /**
     * Get Number of matches loss
     * 
     */
    public static function getMatchesLostCount($teamId)
    {
        return self::where('result', self::LOSS_STATUS)->where('team_id', $teamId)->count();
    }

    /**
     * Get Number of matches draw 
     * 
     */
    public static function getMatchesDrawnCount($teamId)
    {
        return self::where('result', self::DRAW_STATUS)->where('team_id', $teamId)->count();
    }
}
