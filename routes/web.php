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

Route::get('/', 'HomeController@index');
Route::get('/logout', 'HomeController@logout');
Route::get('login/google', 'GoogleController@redirectToProvider');
Route::get('login/google/callback', 'GoogleController@handleProviderCallback');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'UserController@index');
    Route::get('/pharmacy-dashboard', 'UserController@pharmacy_dashboard');

});
