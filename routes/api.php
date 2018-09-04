<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//states

Route::get('/states', 'Api\StatesController@index')->name('states');

Route::get('/sectiondatas', 'Api\SectiondatasController@index')->name('sectiondatas');

Route::get('/statesdata', 'Api\onefifteenstatesController@index')->name('sectiondatas');



