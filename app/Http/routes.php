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

Route::group(['prefix' => '/api/v1'], function () {
    Route::post('authenticate', [
        'as' => 'authenticate',
        'uses' => 'LoginController@authenticate'
    ]);

    Route::get('currentAuthUser',[
        'as' => 'currentAuthUser',
        'uses' => 'LoginController@getAuthenticatedUser'
    ]);

    Route::resource('user', 'UserController', [
        'only' => ['index', 'store', 'show', 'update','destroy']
    ]);

    Route::resource('hmo', 'HmoController', [
        'only' => ['index', 'store', 'show', 'update','destroy']
    ]);
});


