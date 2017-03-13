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

Auth::routes();
//search mahasiswa
Route::get('/home', 'HomeController@index');
//view dan edit biodata
Route::get('/biodata','BiodataController@index');
Route::post('/submitbiodata','BiodataController@edit');
//insert new biodata
Route::get('/createbiodata','BiodataController@create');
Route::post('/submitcreatebiodata','BiodataController@submitcreate');
