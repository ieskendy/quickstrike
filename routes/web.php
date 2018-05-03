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
	Route::get('/', 'StyleController@index');
	
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'styles'], function() {
	Route::get('/{id}', 'StyleController@showSingleStyle');
	Route::get('/create', 'StyleController@showStyleForm')->name('create-style-form');
	Route::post('/create', 'StyleController@create')->name('create-style');
	Route::get('/{id}/update', 'StyleController@showUpdateForm')->name('style-update-form');
	Route::put('/{id}/update', 'StyleController@updateStyle')->name('update-style');
	Route::delete('/{id}', 'StyleController@destroyStyle')->name('delete-style');
});

Route::group(['prefix' => 'parts'], function() {
	Route::get('/create', 'PartController@showCreatePartForm');
	Route::post('/create', 'PartController@createPart')->name('create-part');
	Route::get('/{id}/update', 'PartController@showUpdateForm')->name('part-update-form');
	Route::put('/{id}/update', 'PartController@updatePart')->name('update-part');
	Route::delete('/{id}', 'PartController@deletePart')->name('delete-part');
});