<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pengurusanPenggunaController;
use App\Http\Controllers\pengurusanModulController;
use App\Http\Controllers\pengurusanBorangController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//for js wilayah and rancangan
Route::get('/getRancangan/{id}',  [pengurusanPenggunaController::class, 'getRancangan']);

//datatable pengurusan kategori pengguna

Route::get('/pengurusanPengguna/daftarPengguna',  [pengurusanPenggunaController::class, 'create']);
Route::post('/pengurusanPengguna/daftar',  [pengurusanPenggunaController::class, 'daftarPengguna']);
Route::delete('/pengurusanPengguna/delete',  [pengurusanPenggunaController::class, 'deletePengguna']);
Route::get('/pengurusanPengguna/edit/{id}',  [pengurusanPenggunaController::class, 'edit']);
Route::put('/pengurusanPengguna/kemaskini',  [pengurusanPenggunaController::class, 'kemaskiniPengguna']);
Route::put('/pengurusanPengguna/kemaskiniProfil',  [pengurusanPenggunaController::class, 'kemaskiniProfil']);

Route::get('/pengurusanPengguna/senaraiKategoriPengguna',[pengurusanPenggunaController::class, 'senaraiKategoriPengguna']);
Route::post('/pengurusanPengguna/tambahKategoriPengguna',[pengurusanPenggunaController::class, 'tambahKategoriPengguna']);
Route::put('/pengurusanPengguna/kemaskiniKategoriPengguna',[pengurusanPenggunaController::class, 'kemaskiniKategoriPengguna']);
Route::get('/pengurusanPengguna/editKategoriPengguna/{id}',[pengurusanPenggunaController::class, 'editKategoriPengguna']);
Route::delete('/pengurusanPengguna/deleteKategoriPengguna',[pengurusanPenggunaController::class, 'deleteKategoriPengguna']);

Route::get('/pengurusanPengguna/maklumatPengguna',  [pengurusanPenggunaController::class, 'maklumatPengguna']);
Route::get('/pengurusanPengguna/senaraiPengguna',  [pengurusanPenggunaController::class, 'senaraiPengguna']);
Route::post('/pengurusanPengguna/cariPengguna',  [pengurusanPenggunaController::class, 'cariPengguna']);

Route::get('/auditTrail/audit', [pengurusanPenggunaController::class, 'auditTrail']);
Route::post('/auditTrail/auditPengguna', [pengurusanPenggunaController::class, 'auditIdPengguna']);
Route::post('/auditTrail/auditTarikh', [pengurusanPenggunaController::class, 'auditTarikh']);
Route::post('/auditTrail/auditTindakan', [pengurusanPenggunaController::class, 'auditTindakan']);

// pengurusan modul
Route::get('/pengurusanModul/ciptaModul', [pengurusanModulController::class, 'create']);
Route::post('/pengurusanModul/simpanModul', [pengurusanModulController::class, 'store']);
Route::get('/pengurusanModul/senaraiModul', [pengurusanModulController::class, 'senaraiModul']);
Route::delete('/pengurusanModul/delete', [pengurusanModulController::class, 'deleteModul']);
Route::post('/pengurusanModul/cariModul',  [pengurusanModulController::class, 'cariModul']);
Route::get('/pengurusanModul/editModul/{id}', [pengurusanModulController::class, 'editModul']);
Route::post('/pengurusanModul/kemaskiniModul',  [pengurusanModulController::class, 'kemaskiniModul']);

Route::post('/pengurusanModul/ciptaProses',  [pengurusanModulController::class, 'ciptaProses']);
Route::get('/pengurusanModul/senaraiProses/{modulId}', [pengurusanModulController::class, 'senaraiProses']);
Route::put('/pengurusanModul/kemaskiniProses',  [pengurusanModulController::class, 'kemaskiniProses']);
Route::delete('/pengurusanProses/delete',  [pengurusanModulController::class, 'deleteProses']);

Route::post('/pengurusanModul/ciptaBorang',  [pengurusanModulController::class, 'ciptaBorang']);
Route::get('/pengurusanModul/senaraiBorang/{prosesId}',  [pengurusanModulController::class, 'senaraiBorang']);
Route::put('/pengurusanModul/kemaskiniBorang',  [pengurusanModulController::class, 'kemaskiniBorang']);
Route::delete('/pengurusanBorang/delete',  [pengurusanModulController::class, 'deleteBorang']);

Route::get('/pengurusanBorang/isiBorang/{borangId}',  [pengurusanBorangController::class, 'isiBorang']);
Route::post('/pengurusanBorang/simpanMedanBorang',  [pengurusanBorangController::class, 'simpanMedanBorang']);

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
