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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('beranda','BerandaController@index')->name('beranda');

Route::get('anggotadkm','AnggotaController@index')->name('anggota');


Route::get('kajian','KajianController@index')->name('kajian');



Route::get('kegiatanislam','KegiatanislamController@index')->name('kegiatanislam');


Route::get('Pelatihan','PelatihanController@index')->name('pelatihan');


Route::get('pengajianrutin','PengajianrutinController@index')->name('pengajianrutin');


Route::get('pemasukan','PemasukanController@index')->name('keuangan.pemasukan');
Route::delete('/pemasukan/{id?}', 'PemasukanController@destroy');



Route::get('pengeluaran','PengeluaranController@index')->name('keuangan.pengeluaran');






