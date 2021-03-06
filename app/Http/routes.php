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

Route::group(['prefix' => '/api/v1', 'middleware' => 'cors'], function () {
    Route::post('authenticate', [
        'as' => 'authenticate',
        'uses' => 'LoginController@authenticate'
    ]);

    Route::get('currentAuthUser',[
        'as' => 'currentAuthUser',
        'uses' => 'LoginController@getAuthenticatedUser'
    ]);

    Route::post('parseCsv',[
        'as' => 'parseCsv',
        'uses' => 'CsvController@store'
    ]);
    Route::resource('user', 'UserController', [
        'only' => ['index', 'store', 'show', 'update','destroy']
    ]);

    Route::get('country', [
        'as' => 'country',
        'uses' => 'PlacesController@getCountry'
    ]);

    Route::get('state', [
        'as' => 'state',
        'uses' => 'PlacesController@getState'
    ]);

    Route::get('lgs', [
        'as' => 'lgs',
        'uses' => 'PlacesController@getLgs'
    ]);

    Route::resource('hmo', 'HmoController', [
        'only' => ['index', 'store', 'show', 'update','destroy']
    ]);
});


