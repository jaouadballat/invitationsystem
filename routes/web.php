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
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/send/{id}', [
    	'uses' => 'InvitationsController@send',
    	'as' => 'send.invitation'
    ]);
Route::get('/calendar', 'EventsController@calendar')->name('calendar');
});

Route::get('/accept/{invitation}', 'InvitationsController@accept');
Route::get('/reject/{invitation}', 'InvitationsController@reject');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
