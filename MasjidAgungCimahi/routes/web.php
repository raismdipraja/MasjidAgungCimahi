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


Auth::routes();


Route::get('/','BerandaController@index')->name('beranda');

Route::get('anggotadkm','AnggotaController@index')->name('anggota');
Route::post('anggotadkm', 'AnggotaController@store');
Route::delete('anggotadkm/{id?}', 'AnggotaController@destroy');
Route::get('anggotadkm/{id?}', 'AnggotaController@edit');
Route::post('anggotadkm/{id?}', 'AnggotaController@update');


Route::get('kajian','KajianController@index')->name('kajian');
Route::delete('kajian/{id?}', 'KajianController@destroy');
Route::post('kajian', 'KajianController@store');
Route::get('kajian/{id?}', 'KajianController@edit');
Route::post('kajian/{id?}', 'KajianController@update');



Route::get('Pelatihan','PelatihanController@index')->name('pelatihan');
Route::post('pelatihan', 'PelatihanController@store');
Route::delete('pelatihan/{id?}', 'PelatihanController@destroy');
Route::get('pelatihan/{id?}', 'PelatihanController@edit');
Route::post('pelatihan/{id?}', 'PelatihanController@update');



Route::get('kegiatanislam','KegiatanislamController@index')->name('kegiatanislam');
Route::post('kegiatanislam', 'KegiatanislamController@store');
Route::delete('kegiatanislam/{id?}', 'KegiatanislamController@destroy');
Route::get('kegiatanislam/{id?}', 'KegiatanislamController@edit');
Route::post('kegiatanislam/{id?}', 'KegiatanislamController@update');



Route::get('pengajianrutin','PengajianrutinController@index')->name('pengajianrutin');
Route::post('pengajianrutin', 'PengajianrutinController@store');
Route::delete('pengajianrutin/{id?}', 'PengajianrutinController@destroy');
Route::get('pengajianrutin/{id?}', 'PengajianrutinController@edit');
Route::post('pengajianrutin/{id?}', 'PengajianrutinController@update');

Route::get('jadwalkhutbah','JadwalkhutbahController@index')->name('jadwalkhutbah');
Route::post('jadwalkhutbah', 'JadwalkhutbahController@store');
Route::delete('jadwalkhutbah/{id?}', 'JadwalkhutbahController@destroy');
Route::get('jadwalkhutbah/{id?}', 'JadwalkhutbahController@edit');
Route::post('jadwalkhutbah/{id?}', 'JadwalkhutbahController@update');



Route::get('pemasukan','PemasukanController@index')->name('keuangan.pemasukan');
Route::post('pemasukan', 'PemasukanController@store');
Route::delete('pemasukan/{id?}', 'PemasukanController@destroy');
Route::get('pemasukan/{id?}', 'PemasukanController@edit');
Route::post('pemasukan/{id?}', 'PemasukanController@update');


Route::get('pengeluaran','PengeluaranController@index')->name('keuangan.pengeluaran');
Route::post('pengeluaran', 'PengeluaranController@store');
Route::delete('pengeluaran/{id?}', 'PengeluaranController@destroy');
Route::get('pengeluaran/{id?}', 'PengeluaranController@edit');
Route::post('pengeluaran/{id?}', 'PengeluaranController@update');






