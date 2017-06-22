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

//search kelas, dan mainpage kelas
Route::get('/kelas','KRSController@index');
Route::get('/kelas/peserta','PesertaController@index');
//edit kelas
Route::get('/kelas/edit','KRSController@edit');
Route::post('/kelas/edit/submit','KRSController@submitedit');
//insert kelas
Route::get('/kelas/create','KRSController@create');
Route::post('/kelas/create/submit','KRSController@submit');

//cek peserta baru dalam kelas
Route::post('/kelas/peserta/cek','APIController@cekNIM');
Route::post('/kelas/peserta/submit','PesertaController@submit');

//course
Route::get('/course','CourseController@index');
//edit course
Route::get('/course/edit','CourseController@edit');
Route::post('/course/edit/submit','CourseController@submitedit');
//insert kelas
Route::get('/course/create','CourseController@create');
Route::post('/course/create/submit','CourseController@submit');

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



//insert nilai
Route::get('/nilai', 'nilaiController@index');//change to course search
Route::get('/nilai/input', 'nilaiController@edit');
Route::post('/nilai/submit', 'nilaiController@submit');
