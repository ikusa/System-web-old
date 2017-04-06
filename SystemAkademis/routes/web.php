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
//homepage
Route::get('/home', 'HomeController@index');
Route::get('/data', 'HomeController@data');
//biodatapage
Route::get('/biodata', 'BiodataController@index');
Route::get('/coloumn', 'BiodataController@coloumn');




// Route::get('/help','HelpController@index');
//
// Route::get('/setting','SettingController@index');
Route::get('/help', function () {
    return redirect('/home');
});
Route::get('/setting', function () {
    return redirect('/home');
});
Route::get('/krs/tambah','KRSStudentController@index');

Route::get('/krs','KRSController@index');
Route::post('/delete','KRSController@delete');
Route::post('/submit','SubmitController@index');
Route::post('/final','SubmitController@submit');
// Route::get('/pengumuman','PengumumanController@index');
Route::get('/pengumuman', function () {
    return redirect('/home');
});
Route::get('/print_krs','PrintController@index');

// Route::get('/khs','KHSController@index');
Route::get('/khs', function () {
    return redirect('/home');
});
