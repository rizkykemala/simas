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

Route::get('/', 'Home@index');

Route::resource('home', 'Home');
Route::resource('uangkas', 'Uangkas');
Route::resource('inventaris', 'Inventaris');
Route::resource('imam', 'Imam');
Route::resource('kegiatan', 'Kegiatan');
