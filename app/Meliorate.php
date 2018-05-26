<?php

namespace App;

use DateTime;
use DateTimeZone;

use Illuminate\Database\Eloquent\Model;

use App\Match;


class Meliorate extends Model
{
    const DATE_NULL = '0000-00-00';
    const DATETIME_NULL = '0000-00-00 00:00:00';
    const MYSQL_DATETIME = 'Y-m-d H:i:s';
    const OVERALL_PREDICTION_LOCK_TIME = '2018-06-14 20:00:00';
    const SITE_DATE_FORMAT = 'd M Y';
    const ADMIN_SITE_DATE_FORMAT = 'jS F , l';
    const ADMIN_SITE_TIME = 'h:i A';
    const ADMIN_SITE_DATE_FORMAT_WITH_TIME = 'jS F , l  h:i A';
    const PER_MATCH_DATE_FORMAT = 'D, M j, Y h:i A';
    const FORMAT_2 = 'jS F , l';
    const MINUTES_FORMAT = '%I';


    /**
     * Available Lock Times
     *
     * @return array
     */
    public static function availableLockTimes()
    {
        $availableLockTimes = [
            5 => '5 Minutes',
            10 => '10 Minutes',
            15 => '15 Minutes',
            30 => '30 Minutes',
            45 => '45 Minutes',
            60 => '1 Hour',
        ];

        return $availableLockTimes;
    }

    /**
     * Subtract Minutes From Time
     *
     * @param datetime
     * @param minutes to subtract
     * 
     * @return datetime
     */
    public static function subtractMinutesFromTime($dateTime = null, $minutes_to_subtract = 10)
    {
        if (null == $dateTime) {
            $current = new DateTime();
        } else {
            $current = new DateTime($dateTime);
        }
        $current->modify('- ' . $minutes_to_subtract . ' minutes');

        return $current->format(self::MYSQL_DATETIME);
    }

    /**
     * Is Match Locked
     *
     * @param matchId
     * 
     * @return boolean
     */
    public static function isMatchLocked($matchId)
    {
        $match = Match::findOrFail($matchId);

        $now = new DateTime();
        $lockTime = new DateTime($match->lock_time);

        $matchLocked = 0;
        if ($now > $lockTime) {
            $matchLocked = 1;
        }

        return $matchLocked;
    }


    /**
     * Is Overall Prediction Locked
     * 
     * @return boolean
     */
    public static function isOverallPredictionLocked()
    {
        $now = new DateTime();
        $overallLockTime = new DateTime(self::OVERALL_PREDICTION_LOCK_TIME);

        $overallPredictionLocked = 0;
        if ($now > $overallLockTime) {
            $overallPredictionLocked = 1;
        }

        return $overallPredictionLocked;
    }

    /**
     * Difference in minutes
     * 
     * @return int
     */
    public static function findTimeDiffInMin($date1, $date2)
    {
        $dateTime1 = new DateTime($date1);
        $dateTime2 = new DateTime($date2);

        $interval = $dateTime1->diff($dateTime2);

        return $interval->format(self::MINUTES_FORMAT);
    }

    /**
     * get number of days from today
     * 
     * @param string $date
     * @return int
     */
    public static function daysFromToday($date)
    {
        $now = new DateTime();
        $today = new DateTime($now->format('Y-m-d'));

        $givenDate = new DateTime($date);

        $diff = $today->diff($givenDate);

        return (int)$diff->format('%R%a') . ' days from now';
    }

    /**
     * date format used in admin side
     * 
     * @param string $date
     * @return string
     */
    public static function adminSiteDate($date, $default = '')
    {
        return self::baseFormater($date, self::ADMIN_SITE_DATE_FORMAT, $default);
    }

    /**
     * date format used in admin side with time
     * 
     * @param string $date
     * @return string
     */
    public static function adminSiteDateWithTime($date, $default = '')
    {
        return self::baseFormater($date, self::ADMIN_SITE_DATE_FORMAT_WITH_TIME, $default);
    }

    /**
     * per match date format
     * 
     * @param string $date
     * @return string
     */
    public static function perMatchDate($date, $default = '')
    {
        return self::baseFormater($date, self::PER_MATCH_DATE_FORMAT, $default);
    }



    /**
     * get Time Alone
     * 
     * @param string $date
     * @return string
     */
    public static function getTime($date, $default = '')
    {
        return self::baseFormater($date, self::ADMIN_SITE_TIME, $default);
    }

    /**
     * check date or datetime is NULL 
     * 
     * @param string $date
     * @return boolean
     */
    public static function hasDate($date)
    {
        if (!empty($date)) {
            return !in_array($date, [self::DATETIME_NULL, self::DATE_NULL]);
        }
        return false;
    }

    /**
     * Basic Formater
     * 
     * @param string $date
     * @return string
     */
    public static function baseFormater($date, $format, $default = '')
    {
        if (self::hasDate($date)) {
            $dateTime = new DateTime($date);
            return $dateTime->format($format);
        }
        return $default;
    }




}
