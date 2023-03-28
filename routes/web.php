<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\BorangController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\WebController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',  [WebController::class, 'landingPage']);

Route::post('/home/contact',  [WebController::class, 'contact']);

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

    Route::get('/home',  [WebController::class, 'homeSetting']);

    Route::post('/home/slider/add',  [WebController::class, 'sliderAdd']);
    Route::put('/home/slider/update',  [WebController::class, 'sliderUpdate']);
    Route::delete('/home/slider/delete',  [WebController::class, 'sliderDelete']);

    Route::post('/home/card/add',  [WebController::class, 'cardAdd']);
    Route::put('/home/card/update',  [WebController::class, 'cardUpdate']);
    Route::delete('/home/card/delete',  [WebController::class, 'cardDelete']);

    Route::post('/home/faq/add',  [WebController::class, 'faqAdd']);
    Route::put('/home/faq/update',  [WebController::class, 'faqUpdate']);
    Route::delete('/home/faq/delete',  [WebController::class, 'faqDelete']);


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
    Route::put('/user-categories/update',[UserController::class, 'category_update']);
    Route::get('/user-categories/{id}/delete',[UserController::class, 'category_delete']);

    Route::get('/audit', [UserController::class, 'user_audit']);
    Route::post('/user_auditFilter', [UserController::class, 'user_auditFilter']);


    Route::get('/moduls', [ModulController::class, 'modul_list']);
    Route::get('/modul/add', [ModulController::class, 'modul_add_page']);
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

    Route::put('/moduls/borang/consent/add', [BorangController::class, 'borangConsent_add']);

    Route::get('/moduls/borang/kelulusan', [BorangController::class, 'borang_kelulusan']);
    Route::post('/moduls/borang/kelulusan/add', [BorangController::class, 'tahapKelulusan_add']);
    Route::put('/moduls/borang/kelulusan/update', [BorangController::class, 'tahapKelulusan_update']);
    Route::delete('/moduls/borang/kelulusan/delete', [BorangController::class, 'tahapKelulusan_delete']);

    Route::post('/moduls/tugasan/add', [ModulController::class, 'tugasan_add']);

    Route::get('/userBorang/view/{idBorang}', [BorangController::class, 'userBorang_view']);
    Route::post('/userBorang/view/add', [BorangController::class, 'userBorang_submit']);
    Route::put('/userBorang/view/update', [BorangController::class, 'userBorang_update']);
    Route::delete('/userBorang/view/delete', [BorangController::class, 'userBorang_delete']);

    Route::post('/moduls/jenisTernakan/add', [ModulController::class, 'jenisTernakan_add']);
    Route::get('/moduls/jenisTernakan/edit', [ModulController::class, 'jenisTernakan_edit']);
    Route::put('/moduls/jenisTernakan/update', [ModulController::class, 'jenisTernakan_update']);
    Route::delete('/moduls/jenisTernakan/delete', [ModulController::class, 'jenisTernakan_delete']);

    Route::post('/moduls/jenisKemas/add', [ModulController::class, 'JenisKemas_add']);
    Route::get('/moduls/jenisKemas/edit', [ModulController::class, 'JenisKemas_edit']);
    Route::put('/moduls/jenisKemas/update', [ModulController::class, 'JenisKemas_update']);
    Route::delete('/moduls/jenisKemas/delete', [ModulController::class, 'JenisKemas_delete']);
    Route::get('/moduls/jenisKemas/{id}/copy', [ModulController::class, 'JenisKemas_copy']);

    Route::post('/moduls/jenisKemas/aktiviti/add', [ModulController::class, 'aktiviti_add']);
    Route::put('/moduls/jenisKemas/aktiviti/update', [ModulController::class, 'aktiviti_update']);
    Route::delete('/moduls/jenisKemas/aktiviti/delete', [ModulController::class, 'aktiviti_delete']);

    Route::get('/moduls/jenisKemas/aktiviti/Param/{prosesId}/{modulId}/{id}', [ModulController::class, 'Param_get']);
    Route::post('/moduls/jenisKemas/aktiviti/Param/add', [ModulController::class, 'Param_add']);
    Route::put('/moduls/jenisKemas/aktiviti/Param/update', [ModulController::class, 'Param_update']);
    Route::delete('/moduls/jenisKemas/aktiviti/Param/delete', [ModulController::class, 'Param_delete']);

    Route::get('/user/borang_app/list', [BorangController::class, 'borangList_app']);
    Route::get('/user/borang_app/{borang_id}/user_list', [BorangController::class, 'borangApp_list']);
    Route::get('/user/borang_app/{borang_id}/{user_id}/view/{level_app}', [BorangController::class, 'borangApp_view']);
    Route::get('/user/borang_app/{borang_id}/{user_id}/pdf', [BorangController::class, 'borangApp_pdf']);
    Route::post('/user/borang_app/list/search', [BorangController::class, 'borangApp_search']);
    Route::post('/user/borang_app/update', [BorangController::class, 'borangApp_update']);

    Route::get('/user/sub_borang/list', [BorangController::class, 'subBorang_list']);
    Route::get('/user/sub_borang/{borang_id}/view', [BorangController::class, 'subBorang_view']);
    Route::get('/user/sub_borang/{borang_id}/edit', [BorangController::class, 'subBorang_edit']);
    Route::put('/user/sub_borang/update', [BorangController::class, 'subBorang_update']);

    Route::get('/user/tugasan/list', [UserController::class, 'tugasList_app']);
    Route::get('/user/tugasan/{tugas_id}/item_list', [UserController::class, 'tugasItem_list']);
    Route::post('/user/tugasan/item_add', [UserController::class, 'tugasItem_add']);
    Route::get('/user/tugasan/{tugas_id}/tugas_item/{item_id}/progress_list', [UserController::class, 'tugasItemProgress_list']);
    Route::post('/user/tugasan/tugas_item/progress_add', [UserController::class, 'tugasItemProgress_add']);

    Route::get('/pelaporan/{id}', [PelaporanController::class, 'proses_list']);
    Route::get('/pelaporan/ternakanList/{proses_id}', [PelaporanController::class, 'ternakan_list']);
    Route::get('/pelaporan/kemaskiniList/{ternakan_id}', [PelaporanController::class, 'kemaskini_list']);
    Route::get('/pelaporan/aktvitiList/{kemaskini_id}', [PelaporanController::class, 'aktiviti_list']);
    Route::get('/pelaporan/userList/{aktiviti_id}', [PelaporanController::class, 'user_list']);
    Route::post('/pelaporan/userSearchList/{aktiviti_id}', [PelaporanController::class, 'userSearch_list']);
    Route::get('/pelaporan/report/{aktiviti_id}/{user_id}', [PelaporanController::class, 'user_report']);
    Route::get('/pelaporan/report/print/{aktiviti_id}/{user_id}', [PelaporanController::class, 'report_print']);

    Route::get('/test', function () {
        return view('pengurusanBorang.TemplatePermohonanPerolehanIbuPejabatWilayah_');
    });

});

// Route::post('/Borang/uploadBorang',  [BorangController::class, 'uploadBorang']);