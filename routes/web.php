<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', 'HomeController@index');
Route::get('/search', 'HomeController@search');

Auth::routes();

Route::get('/penyedia', 'PenyediaController@index');
Route::get('/penyedia/akomodasi', 'PenyediaController@akomodasi');
Route::get('/penyedia/akomodasi-tambah', 'PenyediaController@tambah');
Route::post('/penyedia/akomodasi-tambah/kos', 'PenyediaController@tambah_kos');
Route::post('/penyedia/akomodasi-tambah/kontrakan', 'PenyediaController@tambah_kontrakan');
Route::post('/penyedia/akomodasi-tambah/homestay', 'PenyediaController@tambah_homestay');
Route::get('/penyedia/akomodasi-edit/{id}', 'PenyediaController@akomodasi_edit');
Route::patch('/penyedia/akomodasi-update/{id}', 'PenyediaController@akomodasi_update');
Route::delete('/penyedia/akomodasi-delete/{id}', 'PenyediaController@akomodasi_delete');
Route::get('/penyedia/pemesanan/ver', 'PenyediaController@pemesanan_ver');
Route::get('/penyedia/pemesanan/ver/{id}', 'PenyediaController@pemesanan_terima');
Route::get('/penyedia/pemesanan/not-ver', 'PenyediaController@pemesanan_notver');
Route::delete('/penyedia/pemesanan/not-ver/{id}', 'PenyediaController@pemesanan_batalkan');


Route::get('/penyedia/pembayaran/diproses', 'PenyediaController@pembayaran_diproses');
Route::get('/penyedia/konfirmasi-pembayaran/{id}', 'PenyediaController@pembayaran_konfirmasi');
Route::get('/penyedia/pembayaran/diterima', 'PenyediaController@pembayaran_diterima');
Route::get('/penyedia/detail-pembayaran/{id}', 'PenyediaController@pembayaran_detail');

Route::get('/penyedia/pengaturan', 'PenyediaController@pengaturan');
Route::get('/penyedia/pengaturan/edit-profile/{id}', 'PenyediaController@pengaturan_edit_profile');
Route::patch('/penyedia/pengaturan/update-profile/{id}', 'PenyediaController@pengaturan_update_profile');
Route::patch('/penyedia/pengaturan/edit-password/{id}', 'PenyediaController@pengaturan_update_password');


Route::get('/penyewa', 'PenyewaController@index');
Route::get('/penyewa/pemesanan', 'PenyewaController@pemesanan_ver');
Route::get('/penyewa/pemesanan/ver', 'PenyewaController@pemesanan_ver');
Route::get('/penyewa/pemesanan/not-ver', 'PenyewaController@pemesanan_not_ver');
Route::delete('/penyewa/pemesanan/not-ver/{id}', 'PenyewaController@pemesanan_batalkan');

Route::get('/penyewa/pembayaran', 'PenyewaController@pembayaran');
Route::get('/penyewa/pembayaran-diproses', 'PenyewaController@pembayaran_diproses');
Route::get('/penyewa/pembayaran-berhasil', 'PenyewaController@pembayaran_berhasil');
Route::post('/penyewa/pesan-pembayaran', 'PenyewaController@pesan_pembayaran');
Route::patch('/penyewa/bukti', 'PenyewaController@pembayaran_bukti');
Route::get('/penyewa/detail-pembayaran/{id}', 'PenyewaController@pembayaran_detail');
// Route::get('/penyewa/pembayaran', 'PenyewaController@pembayaran');

Route::get('/penyewa/pengaturan', 'PenyewaController@pengaturan');
Route::get('/penyewa/pengaturan/edit-profile/{id}', 'PenyewaController@pengaturan_edit_profile');
Route::patch('/penyewa/pengaturan/update-profile/{id}', 'PenyewaController@pengaturan_update_profile');
Route::patch('/penyewa/pengaturan/edit-password/{id}', 'PenyewaController@pengaturan_update_password');

Route::post('/penyewa/sewa/{id}', 'PenyewaController@sewa');
Route::post('/penyewa/sewa-insert', 'PenyewaController@sewa_insert');

Route::post('/penyewa/sewa-kontrakan/{id}', 'PenyewaController@sewa_kontrakan');
Route::post('/penyewa/sewa-insert-kontrakan', 'PenyewaController@sewa_insert_kontrakan');

Route::post('/penyewa/sewa-homestay/{id}', 'PenyewaController@sewa_homestay');
Route::post('/penyewa/sewa-insert-homestay', 'PenyewaController@sewa_insert_homestay');


Route::get('/admin', 'AdminController@index');
Route::get('/admin/akomodasi', 'AdminController@akomodasi');
Route::get('/admin/verifikasi-akomodasi/{id}', 'AdminController@verifikasi_akomodasi');
Route::delete('/admin/verifikasi-not-akomodasi/{id}', 'AdminController@verifikasi_notakomodasi');
Route::get('/admin/akun', 'AdminController@akun');
Route::delete('/admin/akun/{id}', 'AdminController@akun_delete');
Route::get('/admin/akun/detail/{id}', 'AdminController@akun_detail');
Route::get('/admin/akun/verifikasi/{id}', 'AdminController@akun_verifikasi');
Route::delete('/admin/akun/delete/{id}', 'AdminController@akun_delete');
Route::get('/admin/testimoni', 'AdminController@testimoni');
Route::get('/admin/pusatbantuan', 'AdminController@pusatbantuan');
Route::get('/admin/pusatbantuan/tambah', 'AdminController@pusatbantuan_tambah');
Route::get('/admin/testimoni', 'AdminController@testimoni');
Route::get('/admin/pengaturan', 'AdminController@pengaturan');
Route::get('/admin/pengaturan/edit-profile/{id}', 'AdminController@pengaturan_edit_profile');
Route::patch('/admin/pengaturan/update-profile/{id}', 'AdminController@pengaturan_update_profile');
Route::patch('/admin/pengaturan/edit-password/{id}', 'AdminController@pengaturan_update_password');

Route::get('/kos', 'KosController@index')->name('kos');
Route::get('/kos/{kecamatan}', 'KosController@byKecamatan');
Route::get('/kos/detail/{id}', 'KosController@detail');

Route::get('/kontrakan', 'KontrakanController@index')->name('kontrakan');
Route::get('/kontrakan/{kecamatan}', 'KontrakanController@byKecamatan');
Route::get('/kontrakan/detail/{id}', 'KontrakanController@detail');

Route::get('/homestay', 'HomestayController@index')->name('homestay');
Route::get('/homestay/detail/{id}', 'HomestayController@detail');
Route::get('/homestay/{kecamatan}', 'HomestayController@byKecamatan');



Route::get('/pusatbantuan', 'PusatbantuanController@index')->name('pusatbantuan');

Route::get('/protected', 'ProtectedController@index')->name('protected');