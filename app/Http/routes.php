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
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' => 'auth.dologin', 'uses' =>  'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' =>  'Auth\AuthController@getLogout']);


Route::group(['middleware' => 'auth'], function () {
	Route::get('/', ['as' => 'apk.index', 'uses' => 'ApkController@index']);
    Route::resource('apk', 'ApkController');

});



Route::group(array('prefix' => 'api'), function()
{
	Route::get('test', 'Api\UpdateapkController@index');
	Route::get('protected/{token}/{file_name}', 'Api\UpdateapkController@download');
	Route::post('check', 'Api\CheckupdateController@check');
	
});