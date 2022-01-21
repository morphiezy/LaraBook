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

Route::get('/','BukuController@index')->name('index');
Route::get('/create','BukuController@create')->name('create');
Route::get('/edit/{id}','BukuController@edit')->name('edit');
Route::put('/update/{id}','BukuController@update')->name('update');
Route::post('/store','BukuController@store')->name('store');
Route::delete('/destroy/{id}','BukuController@destroy')->name('destroy');