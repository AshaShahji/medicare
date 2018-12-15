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
Route::get('/browse-drugs', 'HomeController@browse');
Route::get('/details/{id}', 'HomeController@details');
Route::get('/logout', 'HomeController@logout');
Route::get('login/google', 'GoogleController@redirectToProvider');
Route::get('login/google/callback', 'GoogleController@handleProviderCallback');
Route::get('search-drug', 'HomeController@search
');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'UserController@index');
    Route::get('/add-drug', 'UserController@add_drug');
    Route::post('/add-drug', 'UserController@post_drug');
    Route::post('/sell-drug', 'UserController@sell_drug');
    Route::get('/pharmacy-dashboard', 'UserController@pharmacy_dashboard');
    Route::get('/subscribed-users', 'UserController@subscribed_users');
    Route::post('/paypal/checkout', 'UserController@paypal_checkout');
    Route::post('/paypal/execute', 'UserController@paypal_execute');
    Route::get('/payment-notification', 'UserController@payment_notification');

});

Route::get('admin-login','AdminAuthController@login');
Route::post('verify-admin','AdminAuthController@verify');


Route::group(['middleware' => 'adminAccess'], function () {
    Route::get('admin-home', 'AdminController@index');
    Route::get('manage-pharmacies', 'AdminController@index');
    Route::get('all-drugs', 'AdminController@drugs');
    Route::post('activate-account', 'AdminController@activate_account');
    Route::post('deactivate-account', 'AdminController@deactivate_account');

    Route::post('activate-drug', 'AdminController@activate_drug');
    Route::post('deactivate-drug', 'AdminController@deactivate_drug');

    Route::get('view-store-drugs/{id}', 'AdminController@view_store_drugs');


});

