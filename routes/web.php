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
    return view('grid');
});

Route::get('/', 'WebDashboardController@index');
Route::get('/add', 'WebDashboardController@addForm')->name('add-configuration');
Route::get('/{id}', 'WebDashboardController@editForm')->name('edit-configuration');
