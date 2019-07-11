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

//Route::get('/{any?}', function () {
//    return view('welcome');
//});


/**
 * APP_URL must be setup correctly on the .env
 *  Laravel valet: APP_URL=http://paperlessph.test
 *  php artisan serve: APP_URL=http://localhost
 */
$domainName = str_replace(['http://', 'https://'], '', config('app.url'));


Route::domain("{admin}.$domainName")->group(function () {
    /**
     * Admin Routes
     */
    Route::get('/', function () {
        return view('layouts.app');
    });

    Route::post('users/update/{id}', 'UsersController@update');
    Route::get('users/enable/{id}', 'UsersController@enable');
    Route::get('users/disable/{id}', 'UsersController@softDelete');
    Route::resource('/users', 'UsersController');

    Route::resource('/post-templates', 'PostTemplatesController');

});

/*
|--------------------------------------------------------------------------
| Post Templates
|-----
*/

//Route::resource('post-templates', 'PostTemplatesController');

//Auth::routes();

