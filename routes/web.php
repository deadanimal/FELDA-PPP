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
Route::get('/dashboard', function () {
        return view('dashboard');
    });
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
// Route::get('/auditDates', [UserController::class, 'user_auditDate']);


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
Route::post('/moduls/borang_field/add', [BorangController::class, 'borang_field_update']);
Route::put('/moduls/borang_field/update', [BorangController::class, 'borang_field_update']);
Route::delete('/moduls/borang_field/delete', [BorangController::class, 'borang_field_update']);

});

Route::get('/userView', function () {
    return view('userView.viewBorang');
});// Route::post('/Borang/uploadBorang',  [BorangController::class, 'uploadBorang']);