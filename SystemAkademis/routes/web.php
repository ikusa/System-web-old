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

Route::get('/help',function(){
   return view('help');
});
Route::get('/setting',function(){
   return view('setting');
});

Route::get('/krs',function(){
   return view('krs');
});
Route::get('/khs',function(){
   return view('khs');
});