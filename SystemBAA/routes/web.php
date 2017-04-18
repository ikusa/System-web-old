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
    return redirect('/home');
});

Auth::routes();
//search mahasiswa
Route::get('/home', 'HomeController@index');
Route::get('/pengumuman', 'HomeController@index');

//view dan edit biodata
Route::get('/biodata/edit','BiodataController@index');
Route::post('/submitbiodata','BiodataController@edit');
//insert new biodata
Route::get('/biodata/create','BiodataController@create');
Route::post('/submitcreatebiodata','BiodataController@submitcreate');
//insert new dosen
Route::get('/dosen/create','DosenController@create');
Route::post('/dosen/create/submit','DosenController@submit');
//insert new term
Route::get('/term/create','TermController@create');
Route::post('/term/submit','TermController@submit');
//insert course
Route::get('/course/create','KRSController@create');
Route::post('/course/create/submit','KRSController@submit');
//insert nilai
Route::get('/nilai', 'nilaiController@index');
Route::get('/nilai/input', 'nilaiController@edit');
Route::post('/nilai/submit', 'nilaiController@submit');
