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

Route::post('getStandhoudersForMarkt', function () {
    return view('welcome');
});
Route::get('getStandhoudersForMarkt', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('welcome');
});

/* User Authentication */
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');


/* Authenticated users */
Route::group(['middleware' => 'auth'], function()
{
    // Register
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');

    Route::get('dashboard', array('as'=>'dashboard', function()
	{
	       return View('users.dashboard');
	}));

    Route::get('markten', 'MarktenController@getIndex');

    // API calls
});

return view('errors.404');
