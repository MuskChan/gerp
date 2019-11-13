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


Auth::routes();

Route::group(['middleware' => 'auth'], function (){

    Route::resource('/', 'HomeController');
    Route::resource('/users', 'UsersController');
    Route::resource('/scores', 'ScoresController');
    Route::resource('/charts', 'ChartsController');
    Route::get('/home', 'HomeController@index')->name('home');
});

