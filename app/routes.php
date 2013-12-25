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

Route::get('/', function()
{
	return View::make('index');
});





//Route::resource('profiles', 'ProfilesController');
Route::post('profiles/login', 'ProfilesController@postLogin');

Route::get('/', 'ProfilesController@getIndex' );
Route::get('/login', 'ProfilesController@getIndex' );

Route::group(array('before' => 'auth'), function()
{
    Route::get('/profile', 'ProfilesController@getProfile');

});