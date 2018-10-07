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

Auth::routes();

Route::middleware('auth')->prefix('api')->group(function () {

    Route::get('teams/default', 'TeamsController@show');
    Route::get('users/default', 'UsersController@show');

    Route::get('projects/{project}', 'ProjectsController@show');
    Route::post('projects', 'ProjectsController@store');
    Route::patch('projects/{project}', 'ProjectsController@update');
    Route::delete('projects/{project}', 'ProjectsController@destroy');

    Route::patch('categories/{category}/issues/move', 'MoveIssuesController@update');

});

Route::get('/{any}', 'SpaController@index')->where('any', '.*');