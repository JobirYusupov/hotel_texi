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

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes();

Route::group(['middleware' => [ \Illuminate\Auth\Middleware\Authenticate::class, \App\Http\Middleware\admin::class]], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/user/{user}/edit', 'UserController@edit')->name('user.edit');
    Route::put('/user/{user}', 'UserController@update')->name('user.update');
    Route::delete('/user/{user}', 'UserController@destroy')->name('user.delete');

    Route::get('/user/{user}/texinfos', 'UserController@texinfos')->name('user.texinfos');
    Route::get('/user/{user}/medicalinfos', 'UserController@medicalinfos')->name('user.medicalinfos');

    Route::get('/role/{role}', 'RoleController@show')->name('role.show');

    Route::get('/profile/create/{user}', 'ProfileController@create')->name('profile.create');
    Route::get('/profile/{profile}/edit', 'ProfileController@edit')->name('profile.edit');
    Route::post('/profile', 'ProfileController@store')->name('profile.store');
    Route::put('/profile/{profile}', 'ProfileController@update')->name('profile.update');

    Route::resource('/car', 'CarController');

    Route::resource('/carimage', 'CarimageController');
});

//Route::get('a', function (){
//    return new \App\Http\Resources\Users(\App\User::find(2));
//});
