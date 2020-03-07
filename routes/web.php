<?php

Route::GET('/', 'Dasboard\DasboardController@index');

Auth::routes();

//admin
Route::GET('/dasboard_admin', 'Admin\AdminController@index')->middleware('Admin');
    //instansi
    Route::GET('/admin/instansi', 'Admin\AdminController@index_instansi')->middleware('Admin');
    Route::POST('/admin/tambah_instansi', 'Admin\AdminController@tambah_instansi')->middleware('Admin');
    Route::POST('/admin/hapus_instansi/{id}', 'Admin\AdminController@hapus_instansi')->middleware('Admin');
    Route::POST('/admin/edit_instansi/{id}', 'Admin\AdminController@edit_instansi')->middleware('Admin');
    //guru
    Route::GET('/admin/guru', 'Admin\AdminController@index_guru')->middleware('Admin');
    Route::POST('/admin/tambah_guru', 'Admin\AdminController@tambah_guru')->middleware('Admin');
    Route::POST('/admin/hapus_guru/{id}', 'Admin\AdminController@hapus_guru')->middleware('Admin');
    Route::POST('/admin/edit_guru/{id}', 'Admin\AdminController@edit_guru')->middleware('Admin');
