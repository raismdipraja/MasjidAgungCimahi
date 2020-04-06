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




Route::post('login','Api\UserController@login');

Route::get('/acara','Api\AcaraController@index');
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
Route::get('/keuangan/{id}','Api\KeuanganController@get');
Route::post('/keuangan/store','Api\KeuanganController@store');
Route::post('/keuangan/update/{id}','Api\KeuanganController@update');
Route::get('/keuangan/destroy/{id}','Api\KeuanganController@destroy');

Route::get('/pengajianrutin','Api\PengajianRutinController@index');
Route::get('/pengajianrutin/{id}','Api\PengajianRutinController@get');
Route::post('/pengajianrutin/store','Api\PengajianRutinController@store');
Route::post('/pengajianrutin/update/{id}','Api\PengajianRutinController@update');
Route::get('/pengajianrutin/destroy/{id}','Api\PengajianRutinController@destroy');