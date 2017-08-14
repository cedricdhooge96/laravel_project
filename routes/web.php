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

// INDEX PAGE
Route::get('/', function () {return redirect('/attractions');});
Route::resource('/attractions', 'AttractionController');
Route::get('/about', 'HomeController@about');

// ADMIN
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', 'AdminController@index');

    Route::group(['prefix' => 'attractions'], function () {
        Route::get('/', 'AdminController@attractions');
        Route::get('/create', 'AdminController@create');
        Route::post('/', 'AdminController@store');
        Route::get('/{id}/edit', 'AdminController@edit');
        Route::put('/{id}', 'AdminController@update');
        Route::delete('/{id}', 'AdminController@destroy');
    });
});

// ACCOUNT
Route::get('/account', 'AccountController@index');
Route::get('/account/settings', 'AccountController@settings');
Route::put('/account/update', 'AccountController@update');

// PARKPLAN
Route::resource('/account/parkplans', 'ParkplanController');
Route::post('/account/parkplans/{parkplan}/activate', 'ParkplanController@activate');
Route::post('/account/parkplans/{parkplan}/attractions/{attraction}', 'ParkplanController@add_attraction');
Route::delete('/account/parkplans/{parkplan}/attractions/{attraction}', 'ParkplanController@remove_attraction');

// AUTH
Auth::routes();
