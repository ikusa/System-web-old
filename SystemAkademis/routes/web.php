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

//Auth::routes();
//homepage
Route::get('/home', 'HomeController@index');
Route::get('/data', 'HomeController@data');
//biodatapage
Route::get('/biodata', 'BiodataController@index');
Route::get('/coloumn', 'BiodataController@coloumn');


Route::get('/krs',function(){
   return view('krs');
});
Route::get('/khs',function(){
   return view('khs');
});

Route::get('/help','HelpController@index');

Route::get('/setting','SettingController@index');
Route::get('/krsstudent','KRSStudentController@index');
Route::get('/login','LoginController@index');
Route::get('/krs','KRSController@index');

Route::get('/khs','KHSController@index');
