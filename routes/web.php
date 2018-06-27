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

//Auth::routes();

Route::get('/home', 'Http\Controllers\HomeController@index')->name('home');

Route::prefix( 'video' )->namespace( 'Videos\Controllers' )->group( function() {
	Route::get( '/', 'VideoController@index' )->name( 'video.index' );
	Route::get( '/{video}', 'VideoController@show')->name( 'video.show' );
});


Route::prefix( 'dashboard' )->group( function() {

	Route::resource('/stripe', 'Users\Controllers\StripeController');

});
