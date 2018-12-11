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
    Route::get('/add-drug', 'UserController@add_drug');
    Route::post('/add-drug', 'UserController@post_drug');
    Route::get('/pharmacy-dashboard', 'UserController@pharmacy_dashboard');
    Route::get('/subscribed-users', 'UserController@subscribed_users');

});
