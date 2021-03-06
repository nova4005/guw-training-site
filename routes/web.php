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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/leaderboard', 'ProblemController@leaders')->name('leaders');

//Forms
Route::get('/add-problem', 'ProblemController@create')->name('createproblem')->middleware('auth');
Route::post('/save-problem', 'ProblemController@store')->name('saveproblem');
Route::get('/edit/{id}', 'ProblemController@edit')->name('editproblem')->middleware('auth');
Route::patch('/edit/{id}', 'ProblemController@update')->name('updateproblem')->middleware('auth');
Route::post('/problems/problem-completion', 'UserProblemController@store')->name('completeproblem');
Route::get('/problems/problem-completion-check', 'UserProblemController@problem_status')->name('problemstatus');

//Languages Routes
Route::get("/problems/{problem}", "ProblemController@index")->name('problems')->middleware('auth');