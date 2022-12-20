<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\BorangController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/forgot',  [pengurusanPenggunaController::class, 'forgotPengguna']);
Route::post('/forgot',  [pengurusanPenggunaController::class, 'forgotPenggunaClicked']);

//for js wilayah and rancangan
Route::get('/getRancangan/{id}',  [UserController::class, 'getRancangan']);

//datatable pengurusan kategori pengguna

// Route::get('/pengurusanPengguna/daftarPengguna',  [pengurusanPenggunaController::class, 'create']);
// Route::post('/pengurusanPengguna/daftar',  [pengurusanPenggunaController::class, 'daftarPengguna']);
// Route::delete('/pengurusanPengguna/delete',  [pengurusanPenggunaController::class, 'deletePengguna']);
// Route::get('/pengurusanPengguna/edit/{id}',  [pengurusanPenggunaController::class, 'edit']);
// Route::put('/pengurusanPengguna/kemaskini',  [pengurusanPenggunaController::class, 'kemaskiniPengguna']);
// Route::put('/pengurusanPengguna/kemaskiniProfil',  [pengurusanPenggunaController::class, 'kemaskiniProfil']);

// Route::get('/pengurusanPengguna/senaraiKategoriPengguna',[pengurusanPenggunaController::class, 'senaraiKategoriPengguna']);
// Route::post('/pengurusanPengguna/tambahKategoriPengguna',[pengurusanPenggunaController::class, 'tambahKategoriPengguna']);
// Route::put('/pengurusanPengguna/kemaskiniKategoriPengguna',[pengurusanPenggunaController::class, 'kemaskiniKategoriPengguna']);
// Route::get('/pengurusanPengguna/editKategoriPengguna/{id}',[pengurusanPenggunaController::class, 'editKategoriPengguna']);
// Route::delete('/pengurusanPengguna/deleteKategoriPengguna',[pengurusanPenggunaController::class, 'deleteKategoriPengguna']);

// Route::get('/pengurusanPengguna/maklumatPengguna',  [pengurusanPenggunaController::class, 'maklumatPengguna']);
// Route::get('/pengurusanPengguna/senaraiPengguna',  [pengurusanPenggunaController::class, 'senaraiPengguna']);
// Route::post('/pengurusanPengguna/cariPengguna',  [pengurusanPenggunaController::class, 'cariPengguna']);

// Route::get('/auditTrail/audit', [pengurusanPenggunaController::class, 'auditTrail']);
// Route::post('/auditTrail/auditPengguna', [pengurusanPenggunaController::class, 'auditIdPengguna']);
// Route::post('/auditTrail/auditTarikh', [pengurusanPenggunaController::class, 'auditTarikh']);
// Route::post('/auditTrail/auditTindakan', [pengurusanPenggunaController::class, 'auditTindakan']);

// pengurusan modul
// Route::get('/pengurusanModul/ciptaModul', [pengurusanModulController::class, 'create']);
// Route::post('/pengurusanModul/simpanModul', [pengurusanModulController::class, 'store']);
// Route::get('/pengurusanModul/senaraiModul', [pengurusanModulController::class, 'senaraiModul']);
// Route::delete('/pengurusanModul/delete', [pengurusanModulController::class, 'deleteModul']);
// Route::post('/pengurusanModul/cariModul',  [pengurusanModulController::class, 'cariModul']);
// Route::get('/pengurusanModul/editModul/{id}', [pengurusanModulController::class, 'editModul']);
// Route::get('/pengurusanModul/copyModul/{id}', [pengurusanModulController::class, 'copyModul']);
// Route::post('/pengurusanModul/kemaskiniModul',  [pengurusanModulController::class, 'kemaskiniModul']);

// Route::post('/pengurusanModul/ciptaProses',  [pengurusanModulController::class, 'ciptaProses']);
// Route::get('/pengurusanModul/senaraiProses/{modulId}', [pengurusanModulController::class, 'senaraiProses']);
// Route::put('/pengurusanModul/kemaskiniProses',  [pengurusanModulController::class, 'kemaskiniProses']);
// Route::delete('/pengurusanProses/delete',  [pengurusanModulController::class, 'deleteProses']);

// Route::post('/pengurusanModul/ciptaBorang',  [pengurusanModulController::class, 'ciptaBorang']);
// Route::get('/pengurusanModul/senaraiBorang/{prosesId}',  [pengurusanModulController::class, 'senaraiBorang']);
// Route::put('/pengurusanModul/kemaskiniBorang',  [pengurusanModulController::class, 'kemaskiniBorang']);
// Route::delete('/pengurusanBorang/delete',  [pengurusanModulController::class, 'deleteBorang']);

// Route::get('/pengurusanBorang/isiBorang/{borangId}',  [pengurusanBorangController::class, 'isiBorang']);
// Route::post('/pengurusanBorang/simpanMedanBorang',  [pengurusanBorangController::class, 'simpanMedanBorang']);
// Route::post('/pengurusanBorang/uploadBorang',  [pengurusanBorangController::class, 'uploadBorang']);

require __DIR__.'/auth.php';

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('',  [WebsiteController::class, 'home']);

Route::get('/users/info',  [UserController::class, 'user_info']);
Route::put('/users/update',  [UserController::class, 'user_info_update']);
Route::get('/users',  [UserController::class, 'user_list']);
Route::get('/users/add',  [UserController::class, 'user_add_page']);
Route::post('/users/add',  [UserController::class, 'user_add']);
Route::get('/users/{id}',  [UserController::class, 'user_detail']);
Route::put('/users/{id}',  [UserController::class, 'user_update']);
Route::get('/users/{id}/delete',  [UserController::class, 'user_delete']);

Route::get('/user-categories',[UserController::class, 'category_list']);
Route::post('/user-categories',[UserController::class, 'category_add']);
Route::get('/user-categories/{id}',[UserController::class, 'category_detail']);
Route::put('/user-categories',[UserController::class, 'category_update']);
Route::get('/user-categories/{id}/delete',[UserController::class, 'category_delete']);

Route::get('/audit', [UserController::class, 'user_audit']);


Route::get('/moduls', [ModulController::class, 'modul_list']);
Route::get('/moduls/add', [ModulController::class, 'modul_add_page']);
Route::post('/moduls/add', [ModulController::class, 'modul_add']);
Route::get('/moduls/{id}', [ModulController::class, 'modul_detail']);
Route::get('/moduls/{id}/delete', [ModulController::class, 'modul_delete']);
Route::put('/moduls/{id}', [ModulController::class, 'modul_update']);
Route::get('/moduls/{id}/copy', [ModulController::class, 'modul_copy']);

Route::post('/moduls/proses/add', [ModulController::class, 'proses_add']);
Route::get('/moduls/{modul_id}/proses', [ModulController::class, 'proses_list']);
Route::put('/moduls/proses/update', [ModulController::class, 'proses_update']);
Route::delete('/moduls/proses/delete', [ModulController::class, 'proses_delete']);

Route::post('/moduls/borang/add', [ModulController::class, 'borang_add']);
Route::get('/moduls/{modul_id}/{proses_id}/borang', [ModulController::class, 'borang_list']);
Route::put('/moduls/borang/update', [ModulController::class, 'borang_update']);
Route::delete('/moduls/borang/delete', [ModulController::class, 'borang_delete']);

Route::get('/moduls/{modul_id}/{proses_id}/borang/{borang_id}', [BorangController::class, 'borang_detail']);
Route::post('/moduls/borang_field/update', [BorangController::class, 'borang_field_update']);

// Route::get('/Borang/isiBorang/{borangId}',  [BorangController::class, 'borang_']);
// Route::post('/Borang/simpanMedanBorang',  [BorangController::class, 'simpanMedanBorang']);
// Route::post('/Borang/uploadBorang',  [BorangController::class, 'uploadBorang']);