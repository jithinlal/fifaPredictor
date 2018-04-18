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

Route::get('/', 'HomeController@index');
// Route::get('/coming-soon', 'SoonController@index');
Route::get('/match/{match}', 'MatchController@show');
Route::get('/teams', 'TeamController@index')->name('getPredict');
Route::get('/groupTeams', 'TeamController@groupTeams')->name('getGroupTeams');
Route::get('/players', 'PlayerController@index')->name('getPlayerName');
Route::get('/user/prediction', 'PredictionController@index')->name('submitPrediction');
Route::get('/prediction/data', 'PredictionController@predictedData')->name('getPredictedData');

Auth::routes();


//-----------------------------------Admin Routes--------------------------------------------

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'AdminController@index');

    //Day Controller
    Route::get('/days', 'DayController@create');
    Route::post('/days/add', 'DayController@save');

    //MatchDay Controller
    Route::get('/match-days', 'MatchDayController@index');
    Route::get('/match-days/add/{day}', 'MatchDayController@create');
    Route::post('/match-days/add/{day}', 'MatchDayController@save');
    Route::get('/match-days/remove/day/{day}/match/{match}/from/{from}', 'MatchDayController@delete');

    //Overall Controller
    Route::get('/overall-result', 'OverallResultController@index');
    Route::post('/overall-result/add', 'OverallResultController@save');



});






