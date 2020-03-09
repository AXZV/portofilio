<?php

Route::GET('/', 'Dasboard\DasboardController@index');

Auth::routes();

//ADMIN
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
    //siswa
    Route::GET('/admin/siswa', 'Admin\AdminController@index_siswa')->middleware('Admin');
    Route::POST('/admin/tambah_siswa', 'Admin\AdminController@tambah_siswa')->middleware('Admin');
    Route::POST('/admin/hapus_siswa/{id}', 'Admin\AdminController@hapus_siswa')->middleware('Admin');
    Route::POST('/admin/edit_siswa/{id}', 'Admin\AdminController@edit_siswa')->middleware('Admin');
    //siswa
    Route::GET('/admin/pelajaran', 'Admin\AdminController@index_pelajaran')->middleware('Admin');
    Route::POST('/admin/tambah_pelajaran', 'Admin\AdminController@tambah_pelajaran')->middleware('Admin');
    Route::POST('/admin/hapus_pelajaran/{id}', 'Admin\AdminController@hapus_pelajaran')->middleware('Admin');
    Route::POST('/admin/edit_pelajaran/{id}', 'Admin\AdminController@edit_pelajaran')->middleware('Admin');
    //kelas
    Route::GET('/admin/kelas', 'Admin\AdminController@index_kelas')->middleware('Admin');
    Route::POST('/admin/tambah_kelas', 'Admin\AdminController@tambah_kelas')->middleware('Admin');
    Route::POST('/admin/hapus_kelas/{id}', 'Admin\AdminController@hapus_kelas')->middleware('Admin');
    Route::POST('/admin/edit_kelas/{id}', 'Admin\AdminController@edit_kelas')->middleware('Admin');
    //produk
    Route::GET('/admin/produk', 'Admin\AdminController@index_produk')->middleware('Admin');
    Route::POST('/admin/tambah_produk', 'Admin\AdminController@tambah_produk')->middleware('Admin');
    Route::POST('/admin/hapus_produk/{id}', 'Admin\AdminController@hapus_produk')->middleware('Admin');
    Route::POST('/admin/edit_produk/{id}', 'Admin\AdminController@edit_produk')->middleware('Admin');

//GURU
Route::GET('/dasboard_guru', 'Guru\GuruController@index')->middleware('Guru');   


//GURU
Route::GET('/dasboard_siswa', 'Siswa\SiswaController@index')->middleware('Siswa');   