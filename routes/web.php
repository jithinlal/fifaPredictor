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
Auth::routes();

Route::get('/days', 'DayController@create');
Route::post('/days/add', 'DayController@save');


Route::get('/match-days', 'MatchDayController@index');
<<<<<<< HEAD
=======
Route::get('/match-days/add/{day}', 'MatchDayController@create');


>>>>>>> 305cf026ec1fc32ad665577932253ce954759956
