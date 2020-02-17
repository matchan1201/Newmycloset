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
    return view('mycloset');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('closet/create', 'Admin\ClosetController@add')->middleware('auth');
    Route::post('closet/create', 'Admin\ClosetController@create')->middleware('auth');
    Route::get('closet/edit', 'Admin\ClosetController@edit')->middleware('auth');
    Route::post('closet/edit', 'Admin\ClosetController@update')->middleware('auth');
    Route::get('closet/delete', 'Admin\ClosetController@delete')->middleware('auth');
    Route::get('closet','Admin\ClosetController@index')->middleware('auth');
    Route::get('closet/accessories', 'Admin\ClosetController@accessories')->middleware('auth');
    Route::get('closet/outer', 'Admin\ClosetController@outer')->middleware('auth');
    Route::get('closet/tops', 'Admin\ClosetController@tops')->middleware('auth');
    Route::get('closet/bottoms', 'Admin\ClosetController@bottoms')->middleware('auth');
    Route::get('closet/socks', 'Admin\ClosetController@socks')->middleware('auth');
    Route::get('closet/shoes', 'Admin\ClosetController@shoes')->middleware('auth');
    Route::get('closet/spring', 'Admin\ClosetController@spring')->middleware('auth');
    Route::get('closet/summer', 'Admin\ClosetController@summer')->middleware('auth');
    Route::get('closet/autumn', 'Admin\ClosetController@autumn')->middleware('auth');
    Route::get('closet/winter', 'Admin\ClosetController@winter')->middleware('auth');
    
    
    Route::get('/', 'ClosetController@index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

