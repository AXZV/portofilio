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


Route::get('/', 'Dasboard\DasboardController@index');

Auth::routes(['verify' => true]); //verivy email

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('verified')->middleware('user');

Route::get('/admin_dasboard', 'Admin\AdminController@index')->middleware('verified')->middleware('admin');


Route::get('/admin_dasboard/pegawai', 'Admin\PegawaiController@index')->middleware('verified')->middleware('admin');
Route::POST('/admin_dasboard/proses_hapus_pegawai/{id}', 'Admin\PegawaiController@hapus');
Route::POST('/admin_dasboard/proses_tambah_pegawai', 'Admin\PegawaiController@tambah');
Route::POST('/admin_dasboard/proses_edit_pegawai/{id}', 'Admin\PegawaiController@edit');


Route::get('/admin_dasboard/slider', 'Admin\ImgsliderController@slider')->middleware('verified')->middleware('admin');
Route::POST('/admin_dasboard/proses_edit_captionslider', 'Admin\ImgsliderController@updateslidercaption');
Route::POST('/admin_dasboard/proses_edit_imgslider', 'Admin\ImgsliderController@updatesliderimage');


