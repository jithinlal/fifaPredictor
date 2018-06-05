<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/api/allTime', 'ApiController@allTime');

Route::get('/', 'HomeController@index');
Route::get('/favTeam', function () {
	return view('myteam.index');
});
Route::get('/leaderboard', function () {
	return view('leaderboard.index');
});
Route::get('/favTeam/{team}', 'FavController@index');
// Route::get('/coming-soon', 'SoonController@index');
Route::get('/match/{match}', 'MatchController@show');
Route::get('/teams', 'TeamController@index')->name('getPredict');
Route::get('/groupTeams', 'TeamController@groupTeams')->name('getGroupTeams');
Route::get('/players', 'PlayerController@index')->name('getPlayerName');
Route::get('/user/prediction', 'PredictionController@index')->name('submitPrediction');
Route::get('/prediction/data', 'PredictionController@predictedData')->name('getPredictedData');

// Individual match Prediction
Route::get('away_team/goal', 'PredictionController@awayScore')->name('getAwayTeamGoal');
Route::get('home_team/goal', 'PredictionController@homeScore')->name('getHomeTeamGoal');
Route::get('yellow/card', 'PredictionController@yellowCard')->name('getYellowCard');
Route::get('red/card', 'PredictionController@redCard')->name('getRedCard');
Route::get('hat/trick', 'PredictionController@hatTrick')->name('getHatTrick');
Route::get('own/goal', 'PredictionController@ownGoal')->name('getOwnGoal');

Auth::routes();


//-----------------------------------Admin Routes--------------------------------------------

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {
	Route::get('/', 'AdminController@index');

    //Day Controller
	Route::get('/days', 'DayController@create');
	Route::post('/days/add', 'DayController@save');

    //MatchDay Controller
	Route::get('/match-days', 'MatchDayController@index');
	Route::get('/match-days/add/{day}', 'MatchDayController@create');
	Route::post('/match-days/add/{day}', 'MatchDayController@save');
	Route::get('/match-days/remove/day/{day}/match/{match}/from/{from}', 'MatchDayController@delete');

    //Overall Result Controller
	Route::get('/overall-result', 'OverallResultController@index');
	Route::post('/overall-result/add', 'OverallResultController@save');

	//PerMatch Result Controller
	Route::get('/per-match-result', 'PerMatchResultController@index');
	Route::get('/per-match-result/match/{match}', 'PerMatchResultController@match');
	Route::post('/per-match-result/save', 'PerMatchResultController@save');
	Route::post('/per-match-result/mark-as-published', 'PerMatchResultController@markAsPublished');
	Route::post('/per-match-result/bonus-points', 'PerMatchResultController@bonusPoints');

	//Lock Match Controller
	Route::get('/lock-match', 'LockMatchController@index');
	Route::post('/lock-match/run-lock-time', 'LockMatchController@save');

	//Prediction Point Controller
	Route::get('/prediction-points', 'PredictionPointController@index');
	Route::post('/prediction-points/update', 'PredictionPointController@update');


});






