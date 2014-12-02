<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', ['as'=> 'home', function()
{
	return View::make('home');
}])->before('auth');

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController', ['only'=>['create', 'destory', 'store']]);

Route::group(array('before'=>'auth'), function()
{
	Route::resource('employees', 'EmployeeController');
	Route::get('vacations/save/{employee}', 'VacationController@create');
	Route::resource('vacations', 'VacationController', ['except' => ['create']]);
});
