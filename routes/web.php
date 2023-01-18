<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\BorangController;


Route::get('/', function () {
    return view('welcome');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::get('/forgot',  [UserController::class, 'forgotPengguna']);
Route::post('/forgot',  [UserController::class, 'forgotPenggunaClicked']);

//for js wilayah and rancangan
Route::get('/getRancangan/{id}',  [UserController::class, 'getRancangan']);

require __DIR__.'/auth.php';

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('',  [WebsiteController::class, 'home']);
Route::middleware(['auth'])->group(function () {

// Route::get('/dashboard', function () {
//         return view('dashboard');
// });
Route::get('/dashboard',  [UserController::class, 'dashboard']);

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
Route::post('/user_auditFilter', [UserController::class, 'user_auditFilter']);


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
Route::post('/moduls/borang_field/add', [BorangController::class, 'borang_field_add']);
Route::put('/moduls/borang_field/update', [BorangController::class, 'borang_field_update']);
Route::delete('/moduls/borang_field/delete', [BorangController::class, 'borang_field_delete']);
Route::get('/moduls/borang/viewBorang', [BorangController::class, 'borang_view']);
Route::get('/moduls/{modul_id}/{proses_id}/borang/{borang_id}', [BorangController::class, 'borang_detail']);

Route::post('/moduls/tugasan/add', [ModulController::class, 'tugasan_add']);
Route::get('/moduls/tugasan/edit', [ModulController::class, 'tugasan_edit']);
Route::put('/moduls/tugasan/update', [ModulController::class, 'tugasan_update']);
Route::delete('/moduls/tugasan/delete', [ModulController::class, 'tugasan_delete']);

Route::post('/moduls/tugasan/checkbox/add', [ModulController::class, 'checkbox_add']);
Route::put('/moduls/tugasan/checkbox/update', [ModulController::class, 'checkbox_update']);
Route::delete('/moduls/tugasan/checkbox/delete', [ModulController::class, 'checkbox_delete']);

Route::get('/userBorang/view/{idBorang}', [BorangController::class, 'userBorang_view']);
Route::post('/userBorang/view/add', [BorangController::class, 'userBorang_submit']);
Route::put('/userBorang/view/update', [BorangController::class, 'userBorang_update']);
Route::delete('/userBorang/view/delete', [BorangController::class, 'userBorang_delete']);

Route::post('/moduls/jenisKemas/add', [ModulController::class, 'JenisKemas_add']);
Route::get('/moduls/jenisKemas/edit', [ModulController::class, 'JenisKemas_edit']);
Route::put('/moduls/jenisKemas/update', [ModulController::class, 'JenisKemas_update']);
Route::delete('/moduls/jenisKemas/delete', [ModulController::class, 'JenisKemas_delete']);

Route::post('/moduls/jenisKemas/Param/add', [ModulController::class, 'Param_add']);
Route::put('/moduls/jenisKemas/Param/update', [ModulController::class, 'Param_update']);
Route::delete('/moduls/jenisKemas/Param/delete', [ModulController::class, 'Param_delete']);

Route::get('/user/borang_app/list', [BorangController::class, 'borangList_app']);
Route::get('/user/borang_app/{borang_id}/user_list', [BorangController::class, 'borangApp_list']);
Route::get('/user/borang_app/{borang_id}/{user_id}/view', [BorangController::class, 'borangApp_view']);
Route::post('/user/borang_app/list/search', [BorangController::class, 'borangApp_search']);
Route::put('/user/borang_app/update', [BorangController::class, 'borangApp_update']);

Route::get('/user/sub_borang/list', [BorangController::class, 'subBorang_list']);
Route::get('/user/sub_borang/{borang_id}/view', [BorangController::class, 'subBorang_view']);
Route::get('/user/sub_borang/{borang_id}/edit', [BorangController::class, 'subBorang_edit']);
Route::put('/user/sub_borang/update', [BorangController::class, 'subBorang_update']);

Route::get('/user/tugasan/list', [UserController::class, 'tugasList_app']);

// Route::get('/test', function () {
//     return view('pengurusanTugasan.senaraiTugasan');
// });
});

// Route::post('/Borang/uploadBorang',  [BorangController::class, 'uploadBorang']);