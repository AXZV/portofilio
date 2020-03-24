<?php

Route::GET('/', 'Dasboard\DasboardController@index');

Auth::routes();

//ADMIN
Route::GET('/dasboard_admin', 'Admin\AdminController@index')->middleware('Admin');

    //setting
    Route::GET('/admin/useraccountset', 'Admin\AdminController@index_useraccountset')->middleware('Admin');
    Route::POST('/admin/edit_useraccountset', 'Admin\AdminController@edit_useraccountset')->middleware('Admin');
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
    //pengguna
    Route::GET('/admin/pengguna', 'Admin\AdminController@index_pengguna')->middleware('Admin');
    Route::POST('/admin/hapus_pengguna/{id}', 'Admin\AdminController@hapus_pengguna')->middleware('Admin');
    Route::POST('/admin/back_pengguna/{id}', 'Admin\AdminController@back_pengguna')->middleware('Admin');
    Route::POST('/admin/edit_pengguna/{id}', 'Admin\AdminController@edit_pengguna')->middleware('Admin');
    //guru_kelas
    Route::GET('/admin/guru_kelas', 'Admin\AdminController@index_guru_kelas')->middleware('Admin');
    Route::POST('/admin/tambah_guru_kelas', 'Admin\AdminController@tambah_guru_kelas')->middleware('Admin');
    Route::POST('/admin/hapus_guru_kelas/{id}', 'Admin\AdminController@hapus_guru_kelas')->middleware('Admin');
    Route::POST('/admin/edit_guru_kelas/{id}', 'Admin\AdminController@edit_guru_kelas')->middleware('Admin');
    //pengajaran
    Route::GET('/admin/pengajaran', 'Admin\AdminController@index_pengajaran')->middleware('Admin');
    Route::POST('/admin/tambah_pengajaran', 'Admin\AdminController@tambah_pengajaran')->middleware('Admin');
    Route::POST('/admin/hapus_pengajaran/{id}', 'Admin\AdminController@hapus_pengajaran')->middleware('Admin');
    Route::GET('/admin/edit_pengajaran/{id}', 'Admin\AdminController@edit_pengajaran')->middleware('Admin');
    Route::POST('/admin/proses_edit_pengajaran', 'Admin\AdminController@proses_edit_pengajaran')->middleware('Admin');
    Route::GET('/admin/detail_pengajaran/{id}', 'Admin\AdminController@detail_pengajaran')->middleware('Admin');


//GURU
Route::GET('/dasboard_guru', 'Guru\GuruController@index')->middleware('Guru'); 

     //presensi
     Route::GET('/guru/presensi', 'Guru\GuruController@index_presensi')->middleware('Guru');
     Route::GET('/guru/presensi/log_presensi/{id}', 'Guru\GuruController@index_log_presensi')->middleware('Guru');
     Route::GET('/guru/presensi/detail_presensi/{id}', 'Guru\GuruController@detail_presensi')->middleware('Guru');
     Route::GET('/guru/presensi/detail_presensi_harian/{id}', 'Guru\GuruController@detail_presensi_harian')->middleware('Guru');
     Route::GET('/guru/presensi/tambah_presensi/{id}', 'Guru\GuruController@tambah_presensi')->middleware('Guru');
     Route::POST('/guru/proses_presensi', 'Guru\GuruController@proses_presensi')->middleware('Guru');
     Route::POST('/guru/hapus_presensi/{id}', 'Guru\GuruController@hapus_presensi')->middleware('Guru');
     //level_pengajaran
    Route::GET('/guru/level_pengajaran', 'Guru\GuruController@index_level_pengajaran')->middleware('Guru');
    Route::GET('/guru/presensi/log_level_pengajaran/{id}', 'Guru\GuruController@index_log_level_pengajaran')->middleware('Guru');


//SISWA
Route::GET('/dasboard_siswa', 'Siswa\SiswaController@index')->middleware('Siswa');   