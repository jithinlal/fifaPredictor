<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Team;

class BonusPoint extends Model
{
    //protected $fillable = ['match_id', 'day_id'];



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
     * Bonus Points earned by user via his Favourite teams victories and goals scored
     * 
     */
    public static function userBonusPoints($userId)
    {

    }

    /**
     * Bonus Points earned by team victories and goals scored
     * 
     */
    public static function teamBonusPoints($teamId)
    {

    }

    /**
     * Is user's fav team a part of this match
     * 
     */
    public static function isFavTeamPlaying($userId, $matchId)
    {

    }

    /**
     * Bonus Points earned by a user in a specific match
     * 
     */
    public static function userMatchBonusPoints($userId, $matchId)
    {

    }

    /**
     * Goals scored by user's fav team
     * 
     */
    public static function userMatchFavTeamGoals($userId, $matchId)
    {

    }

    /**
     * Points got by Goals scored by user's fav team
     * 
     */
    public static function userMatchFavTeamGoalsPoints($userId, $matchId)
    {

    }

    /**
     * Won or Loss or Draw
     * 
     */
    public static function userMatchFavTeamResult($userId, $matchId)
    {

    }

    /**
     * Points got by user's fav team Won or Loss or Draw
     * 
     */
    public static function userMatchFavTeamResultPoints($userId, $matchId)
    {

    }
}
