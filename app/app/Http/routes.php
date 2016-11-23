<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* User Authentication */
Route::get('users/login', 'Auth\AuthController@getLogin');
Route::post('users/login', 'Auth\AuthController@postLogin');
Route::get('users/logout', 'Auth\AuthController@getLogout');


/* Authenticated users */
Route::group(['middleware' => 'auth'], function()
{
    Route::get('users/register', 'Auth\AuthController@getRegister');
    Route::post('users/register', 'Auth\AuthController@postRegister');

    Route::get('users/dashboard', array('as'=>'dashboard', function()
	{
	       return View('users.dashboard');
	}));
});

return view('welcome');
