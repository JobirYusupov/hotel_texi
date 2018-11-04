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

Route::post('login', 'API\UserController@login');


Route::middleware('auth:api')->group( function () {
    Route::get('/user/{user}', 'API\UserController@show');
    Route::get('/user/{user}/myself', 'API\UserController@showForSelf');
    Route::post('/medicalinfo', 'API\UserController@storemedicalinfo');
    Route::post('/texinfo', 'API\UserController@storetexinfo');
});
Route::get('/user/{user}/gai', 'API\UserController@showForSelf');
Route::get('/user', 'API\UserController@index');
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
