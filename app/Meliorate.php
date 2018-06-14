<?php

namespace App;

use DateTime;
use DateTimeZone;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use Illuminate\Database\Eloquent\Model;

use App\Match;
use App\Day;
use App\MatchDay;
use App\UserMatchPrediction;
use App\Mail\SendUserEmail;
use App\Notifications\SendMarkdownUser;
use Notification;


class Meliorate extends Model
{
	const DATE_NULL = '0000-00-00';
	const DATETIME_NULL = '0000-00-00 00:00:00';
	const MYSQL_DATETIME = 'Y-m-d H:i:s';
	const MYSQL_DATE = 'Y-m-d';
	const OVERALL_PREDICTION_LOCK_TIME = '2018-06-19 23:00:00';
	const SITE_DATE_FORMAT = 'd M Y';
	const ADMIN_SITE_DATE_FORMAT = 'jS F , l';
	const ADMIN_SITE_TIME = 'h:i A';
	const ADMIN_SITE_DATE_FORMAT_WITH_TIME = 'jS F , l  h:i A';
	const PER_MATCH_DATE_FORMAT = 'D, M j, Y h:i A';
	const FORMAT_2 = 'jS F , l';
	const MINUTES_FORMAT = '%i';
	const HIS_FORMAT = '%h Hour %i Minutes';

	const ADMINS = [1, 2];

	const MIN_DAY = '2018-06-14';
	const MAX_DAY = '2018-07-15';

	// const MIN_DAY = '2018-06-1';
	// const MAX_DAY = '2018-06-12';


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
	 * Difference in his
	 *
	 * @return int
	 */
	public static function findTimeDiffInHis($date1, $date2)
	{
		$dateTime1 = new DateTime($date1);
		$dateTime2 = new DateTime($date2);

		$interval = $dateTime1->diff($dateTime2);
		$oldFormat = $interval->format(self::MINUTES_FORMAT);
		if ($oldFormat == 0) {
			return $interval->format(self::HIS_FORMAT);
		}
		return $oldFormat;
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
	 * is result published
	 * @param integer $matchId
	 * @return bool
	 */
	public static function isMatchPublised($matchId)
	{
		$isPredicted = Match::find($matchId)->result_published;
		if ($isPredicted == 0) {
			return false;
		} else {
			return true;
		}
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

	/**
	 *	If Predicted
	 *	@param string
	 *	@return boolean
	 */
	public static function isItemPredicted($predictionId, $matchId)
	{
		$result = UserMatchPrediction::where([['user_id', Auth::id()], ['match_id', $matchId], ['prediction_id', $predictionId]])->get();
		$resultCount = $result->count();
		$result = $result->first();
		if ($resultCount == 0) {
			return -1;
		} else {
			if ($predictionId == 17) {
				return $result->prediction;
			} else if ($predictionId == 18) {
				return $result->prediction;
			} else if (in_array($predictionId, [19, 20, 21, 22])) {
				if ($result->prediction) {
					return 'YES';
				} else {
					return 'NO';
				}
			}
		}
	}

	/**
	 * Find the current lock time gap
	 *
	 */
	public static function currentLockTimeGap()
	{
		$match1 = Match::find(1);
		$lockGap = 10;
		if ($match1->lock_time) {
			$lockGap = self::findTimeDiffInHis($match1->date, $match1->lock_time);
		}
		return $lockGap;
	}

	/**
	 * Get Number of users supporting a teams
	 *
	 */
	public static function getSupportingUserCount($teamId)
	{
		return User::where('fav_team_id', $teamId)->whereNotIn('id', self::ADMINS)->get()->count();
	}

	/**
	 * Find Out If Today is a Match Day
	 *
	 */
	public static function isTodayAMatchDay()
	{
		$today = new DateTime();
		$todayMySql = $today->format(self::MYSQL_DATE);

		if (1 == Day::where('day', $todayMySql)->count()) {
			return Day::where('day', $todayMySql)->value('id');
		}

		return false;
	}

	/**
	 * Get Matches Coming in the current match day
	 *
	 */
	public static function currentMatchDayGames()
	{
		if (self::isTodayAMatchDay()) {

			$query = DB::table('match_days')
				->join('days', 'days.id', '=', 'match_days.day_id')
				->join('matches', 'matches.id', '=', 'match_days.match_id');

			$query->select(
				'days.id',
				'days.day',

				'match_days.match_id',

				'matches.type',
				'matches.home_team',
				'matches.away_team',
				'matches.home_result',
				'matches.away_result',
				'matches.penalty',
				'matches.result_text',
				'matches.date',
				'matches.stadium_id',
				'matches.lock_time',
				'matches.result_published'
			);

			$query->where('match_days.day_id', self::isTodayAMatchDay());

			return $query->get();

		} else {
			return false;
		}

	}

	/**
	 * Find Next Match Day
	 *
	 */
	public static function nextMatchDay()
	{
		$today = new DateTime();
		$todayMySql = $today->format(self::MYSQL_DATE);
		return Day::where('day', '>', $todayMySql)->pluck('id')->first();
	}

	/**
	 * Get Matches Coming in the next match day
	 *
	 */
	public static function upcomingMatchDayGames()
	{
		if (!self::isTournamentLastDayOrOver()) {

			$query = DB::table('match_days')
				->join('days', 'days.id', '=', 'match_days.day_id')
				->join('matches', 'matches.id', '=', 'match_days.match_id');

			$query->select(
				'days.id',
				'days.day',

				'match_days.match_id',

				'matches.type',
				'matches.home_team',
				'matches.away_team',
				'matches.home_result',
				'matches.away_result',
				'matches.penalty',
				'matches.result_text',
				'matches.date',
				'matches.stadium_id',
				'matches.lock_time',
				'matches.result_published'
			);

			$query->where('match_days.day_id', self::nextMatchDay());

			return $query->get();

		} else {
			return false;
		}
	}

	/**
	 * Find previous Match Day
	 *
	 */
	public static function previousMatchDay()
	{
		$today = new DateTime();
		$todayMySql = $today->format(self::MYSQL_DATE);
		$array1 = Day::where('day', '<', $todayMySql)->pluck('id')->toArray();
		if (!empty($array1)) {
			return array_slice($array1, -1)[0];
		}
		return 0;
	}

	/**
	 * Get Matches Coming in the previous match day
	 *
	 */
	public static function previousMatchDayGames()
	{
		if (self::hasTournamentBegun()) {

			$query = DB::table('match_days')
				->join('days', 'days.id', '=', 'match_days.day_id')
				->join('matches', 'matches.id', '=', 'match_days.match_id');

			$query->select(
				'days.id',
				'days.day',

				'match_days.match_id',

				'matches.type',
				'matches.home_team',
				'matches.away_team',
				'matches.home_result',
				'matches.away_result',
				'matches.penalty',
				'matches.result_text',
				'matches.date',
				'matches.stadium_id',
				'matches.lock_time',
				'matches.result_published'
			);

			$query->where('match_days.day_id', self::previousMatchDay());

			return $query->get();

		} else {
			return false;
		}
	}



	public static function hasTournamentBegun()
	{
		$today = new DateTime();
		$firstMatchDay = new DateTime(self::MIN_DAY);
		return $today >= $firstMatchDay;
	}

	public static function isFirstDay()
	{
		$today = new DateTime();
		$todayFormat = $today->format(self::MYSQL_DATE);

		$firstMatchDay = new DateTime(self::MIN_DAY);
		$firstDayFormat = $firstMatchDay->format(self::MYSQL_DATE);

		return $todayFormat == $firstDayFormat;
	}

	public static function isTournamentLastDayOrOver()
	{
		$today = new DateTime();
		$lastMatchDay = new DateTime(self::MAX_DAY);

		return $today >= $lastMatchDay;
	}

	public static function getOverallLockTime()
	{
		$lockDate = new DateTime(self::OVERALL_PREDICTION_LOCK_TIME);
		return $lockDate->format(self::ADMIN_SITE_DATE_FORMAT_WITH_TIME);
	}

	public static function hasUserPredictedAll($matchId)
	{
		return UserMatchPrediction::where('match_id', $matchId)->where('user_id', Auth::id())->whereIn('prediction_id', [17, 18, 19, 20, 21, 22])->count() == 6;
	}

	public static function userPredictedCount($matchId)
	{
		return UserMatchPrediction::where('match_id', $matchId)->where('user_id', Auth::id())->whereIn('prediction_id', [17, 18, 19, 20, 21, 22])->count();
	}

	public function sendMail()
	{
		$users = \App\User::all();
		$mails = [];
		foreach ($users as $user) {
			$mails[] = $user->email;
		}

		// Notification::send('jithinlal@softwareassociates.in', new SendMarkdownUser);
		Notification::route('mail', 'jithinlal@softwareassociates.in')->notify(new SendMarkdownUser('jithinlal@softwareassociates.in'));
	}

}
