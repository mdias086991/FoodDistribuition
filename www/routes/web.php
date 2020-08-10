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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create-client', 'ClientController@create')->name('create');
Route::post('/store-client', 'ClientController@store')->name('store');
Route::get('/client/{client}', 'ClientController@show')->name('show');
Route::post('/client/{client}/edit', 'ClientController@update')->name('edit.client');
Route::get('/client/{client}/delete', 'ClientController@destroy')->name('delete');
Route::post('/client/{client}', 'ClientController@show')->name('edit');

// Route::post('/client/{address}/delete', 'AddressController@destroy')->name('address.delete');
Route::delete('/address/{address}/delete', 'AddressController@destroy')->name('address.delete');
Route::patch('/address/{address}/update', 'AddressController@update')->name('address.update');
Route::post('/address/store', 'AddressController@store')->name('address.store');


Auth::routes();

