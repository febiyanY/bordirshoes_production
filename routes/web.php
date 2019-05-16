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
Route::get('/login', function () {
    return view('welcome');
});

Route::get('/pembelian','PembelianController@req_mentah')->name('pembelian');
Route::get('/pembelian/req_mentah','PembelianController@req_mentah');
Route::post('/pembelian/proses_req_mentah','PembelianController@proses_req_mentah');
Route::post('/pembelian/proses_done_mentah','PembelianController@proses_done_mentah');
Route::get('/pembelian/done_mentah','PembelianController@done_mentah');
Route::post('/pembelian/konfirmasi_req_mentah','PembelianController@konfirmasi_req_mentah');
Route::post('/pembelian/konfirmasi_done_mentah','PembelianController@konfirmasi_done_mentah');

Route::get('/pembelian/req_pendukung','PembelianController@req_pendukung');
Route::post('/pembelian/proses_req_pendukung','PembelianController@proses_req_pendukung');
Route::post('/pembelian/proses_done_pendukung','PembelianController@proses_done_pendukung');
Route::get('/pembelian/done_pendukung','PembelianController@done_pendukung');
Route::post('/pembelian/konfirmasi_req_pendukung','PembelianController@konfirmasi_req_pendukung');
Route::post('/pembelian/konfirmasi_done_pendukung','PembelianController@konfirmasi_done_pendukung');

Route::post('/login','LoginController@index');

Route::get('/logistik/dewasa','LogistikController@dewasa')->name('logistik');
Route::get('/logistik/cek_stok_produk','LogistikController@cek_stok_produk');
Route::get('/logistik/cek_stok_mentah','LogistikController@cek_stok_mentah');
Route::get('/logistik/cek_stok_pendukung','LogistikController@cek_stok_pendukung');
Route::get('/logistik/req_mentah','LogistikController@req_mentah');
Route::post('/logistik/req_mentah','LogistikController@request_mentah');
Route::get('/logistik/stok_mentah','LogistikController@stok_mentah');
Route::get('/logistik/req_pendukung','LogistikController@req_pendukung');
Route::post('/logistik/req_pendukung','LogistikController@request_pendukung');
Route::get('/logistik/stok_pendukung','LogistikController@stok_pendukung');