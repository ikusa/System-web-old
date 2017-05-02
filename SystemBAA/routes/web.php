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
//login
Auth::routes();

//search mahasiswa, dan mainpage home
Route::get('/home', 'HomeController@index');

//blm di implement
//Route::get('/pengumuman', 'HomeController@index');

//search course, dan mainpage course
Route::get('/course','KRSController@index');
Route::get('/course/peserta','PesertaController@index');
Route::get('/course/edit','KRSController@edit');
Route::post('/course/edit/submit','KRSController@submitedit');

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
Route::get('/nilai', 'nilaiController@index');//change to course search
Route::get('/nilai/input', 'nilaiController@edit');
Route::post('/nilai/submit', 'nilaiController@submit');
