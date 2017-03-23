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

Route::get('/','PageController@welcome' );
Route::get('/test','PageController@welcome');

Auth::routes();
//homepage
Route::get('/home', 'HomeController@index');
Route::get('/data', 'HomeController@data');
//biodatapage
Route::get('/biodata', 'BiodataController@index');
Route::get('/coloumn', 'BiodataController@coloumn');




Route::get('/help','HelpController@index');

Route::get('/setting','SettingController@index');
Route::get('/krsstudent','KRSStudentController@index');
//<<<<<<< HEAD
//Route::get('/login','LoginController@index');
//=======
//login','LoginController@index');
//>>>>>>> origin/master
Route::get('/krs','KRSController@index');
Route::post('/delete','KRSController@delete');
Route::post('/submit','SubmitController@index');
Route::post('/final','SubmitController@final');
Route::get('/pengumuman','PengumumanController@index');

Route::get('/khs','KHSController@index');
