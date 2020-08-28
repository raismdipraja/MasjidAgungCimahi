<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Route::post('login','Api\UserController@login');

Route::get('/acara','Api\AcaraController@index');
Route::get('/acara/kajian','Api\AcaraController@indexkajian');
Route::get('/acara/pelatihan','Api\AcaraController@indexpelatihan');
Route::get('/acara/kegiatanislam','Api\AcaraController@indexkegiatanislam');
Route::get('/acara/{id}','Api\AcaraController@get');
Route::post('/acara/store','Api\AcaraController@store');
Route::post('/acara/update/{id}','Api\AcaraController@update');
Route::get('/acara/destroy/{id}','Api\AcaraController@destroy');

Route::get('/berita','Api\BeritaController@index');
Route::get('/berita/{id}','Api\BeritaController@get');
Route::post('/berita/store','Api\BeritaController@store');
Route::post('/berita/update/{id}','Api\BeritaController@update');
Route::get('/berita/destroy/{id}','Api\BeritaController@destroy');

Route::get('/jadwalkhutbah','Api\JadwalKhutbahController@index');
Route::get('/jadwalkhutbah/{id}','Api\JadwalKhutbahController@get');
Route::post('/jadwalkhutbah/store','Api\JadwalKhutbahController@store');
Route::post('/jadwalkhutbah/update/{id}','Api\JadwalKhutbahController@update');
Route::get('/jadwalkhutbah/destroy/{id}','Api\JadwalKhutbahController@destroy');

Route::get('/keuangan','Api\KeuanganController@index');
Route::get('/keuangan/pemasukan','Api\KeuanganController@indexpemasukan');
Route::get('/keuangan/pengeluaran','Api\KeuanganController@indexpengeluaran');
Route::get('/keuangan/jumlahpemasukan','Api\KeuanganController@jumlahpemasukan');
Route::get('/keuangan/jumlahpengeluaran','Api\KeuanganController@indexjumlahpengeluaran');
Route::get('/keuangan/jumlahtotal','Api\KeuanganController@indexjumlahtotal');
Route::get('/keuangan/{id}','Api\KeuanganController@get');
Route::post('/keuangan/store','Api\KeuanganController@store');
Route::post('/keuangan/update/{id}','Api\KeuanganController@update');
Route::get('/keuangan/destroy/{id}','Api\KeuanganController@destroy');


Route::get('/pengajianrutin','Api\PengajianRutinController@index');
Route::get('/pengajianrutin/senin','Api\PengajianRutinController@indexpengajiansenin');
Route::get('/pengajianrutin/selasa','Api\PengajianRutinController@indexpengajianselasa');
Route::get('/pengajianrutin/rabu','Api\PengajianRutinController@indexpengajianrabu');
Route::get('/pengajianrutin/kamis','Api\PengajianRutinController@indexpengajiankamis');
Route::get('/pengajianrutin/jumat','Api\PengajianRutinController@indexpengajianjumat');
Route::get('/pengajianrutin/sabtu','Api\PengajianRutinController@indexpengajiansabtu');
Route::get('/pengajianrutin/minggu','Api\PengajianRutinController@indexpengajianminggu');
Route::get('/pengajianrutin/{id}','Api\PengajianRutinController@get');
Route::post('/pengajianrutin/store','Api\PengajianRutinController@store');
Route::post('/pengajianrutin/update/{id}','Api\PengajianRutinController@update');
Route::get('/pengajianrutin/destroy/{id}','Api\PengajianRutinController@destroy');