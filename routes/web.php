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

// Route::get('/',  [WebController::class, 'landingPage']);
// Route::get('/penyataan',  [WebController::class, 'statementList']);
Route::get('/document',  [WebController::class, 'documentList']);

Route::get('/',  [WebController::class, 'homePage']);
Route::get('/page/{pageId}',  [WebController::class, 'page']);
Route::get('/gallery/{galleryID}',  [WebController::class, 'gallery_pic']);
Route::get('/doc/{itemId}',  [WebController::class, 'document_page']);

Route::post('/home/contact',  [WebController::class, 'contact']);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::get('/forgot',  [UserController::class, 'forgotPengguna']);
Route::post('/forgot',  [UserController::class, 'forgotPenggunaClicked']);

//for js wilayah and rancangan
Route::get('/getRancangan/{id}',  [UserController::class, 'getRancangan']);

//for js project and peneroka
Route::get('/getPeneroka/{id}',  [UserController::class, 'getPeneroka']);

require __DIR__.'/auth.php';

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('',  [WebsiteController::class, 'home']);
Route::middleware(['auth'])->group(function () {
    // Route::get('/dashboard', function () {
    //         return view('dashboard');
    // });
    Route::get('/dashboard',  [UserController::class, 'dashboard']);

    Route::get('/setting',  [WebController::class, 'page_list']);
    
    Route::post('/setting/event/add',  [WebController::class, 'event_add']);
    Route::put('/setting/event/update',  [WebController::class, 'event_update']);
    Route::delete('/setting/event/delete',  [WebController::class, 'event_delete']);

    Route::get('/home',  [WebController::class, 'page_list']);
    Route::post('/home/page/add',  [WebController::class, 'page_add']);
    Route::put('/home/page/update',  [WebController::class, 'page_update']);
    Route::delete('/home/page/delete',  [WebController::class, 'page_delete']);
    
    Route::get('/home/page/{pageId}/item',  [WebController::class, 'item_list']);
    Route::post('/home/page/item/add',  [WebController::class, 'item_add']);
    Route::put('/home/page/item/update',  [WebController::class, 'item_update']);
    Route::delete('/home/page/item/delete',  [WebController::class, 'item_delete']);
    
    Route::get('/home/page/item/{itemId}',  [WebController::class, 'item_category']);
    
    Route::get('/home/item/{itemId}/slider',  [WebController::class, 'slider_list']);
    Route::post('/home/slider/add',  [WebController::class, 'sliderAdd']);
    Route::put('/home/slider/update',  [WebController::class, 'sliderUpdate']);
    Route::delete('/home/slider/delete',  [WebController::class, 'sliderDelete']);

    Route::get('/home/item/{itemId}/card',  [WebController::class, 'card_list']);
    Route::post('/home/card/add',  [WebController::class, 'cardAdd']);
    Route::put('/home/card/update',  [WebController::class, 'cardUpdate']);
    Route::delete('/home/card/delete',  [WebController::class, 'cardDelete']);

    Route::get('/home/item/{itemId}/dropdown',  [WebController::class, 'dropdown_list']);
    Route::post('/home/dropdown/add',  [WebController::class, 'dropdown_add']);
    Route::put('/home/dropdown/update',  [WebController::class, 'dropdown_update']);
    Route::delete('/home/dropdown/delete',  [WebController::class, 'dropdown_delete']);
    
    Route::get('/home/item/{itemId}/article',  [WebController::class, 'article_list']);
    Route::post('/home/article/add',  [WebController::class, 'article_add']);
    Route::put('/home/article/update',  [WebController::class, 'article_update']);
    Route::delete('/home/article/delete',  [WebController::class, 'article_delete']);

    Route::get('/home/item/{itemId}/gallery',  [WebController::class, 'gallery_list']);
    Route::post('/home/gallery/add',  [WebController::class, 'gallery_add']);
    Route::put('/home/gallery/update',  [WebController::class, 'gallery_update']);
    Route::delete('/home/gallery/delete',  [WebController::class, 'gallery_delete']);

    Route::get('/home/item/{itemId}/gallery/{galleryId}/picture',  [WebController::class, 'picture_list']);
    Route::post('/home/picture/add',  [WebController::class, 'picture_add']);
    Route::put('/home/picture/update',  [WebController::class, 'picture_update']);
    Route::delete('/home/picture/delete',  [WebController::class, 'picture_delete']);

    Route::get('/home/item/{itemId}/doc',  [WebController::class, 'doc_list']);
    Route::post('/home/doc/add',  [WebController::class, 'doc_add']);
    Route::put('/home/doc/update',  [WebController::class, 'doc_update']);
    Route::delete('/home/doc/delete',  [WebController::class, 'doc_delete']);


    Route::post('/home/document/add',  [WebController::class, 'documentAdd']);
    Route::put('/home/document/update',  [WebController::class, 'documentUpdate']);
    Route::delete('/home/document/delete',  [WebController::class, 'documentDelete']);


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

    Route::get('/moduls/borang/checkbox/{medan_id}', [BorangController::class, 'checkbox_list']);
    Route::post('/moduls/borang/checkbox/add', [BorangController::class, 'checkbox_add']);
    Route::put('/moduls/borang/checkbox/update', [BorangController::class, 'checkbox_update']);
    Route::delete('/moduls/borang/checkbox/delete', [BorangController::class, 'checkbox_delete']);

    Route::put('/moduls/borang/consent/add', [BorangController::class, 'borangConsent_add']);

    Route::get('/moduls/borang/kelulusan', [BorangController::class, 'borang_kelulusan']);
    Route::post('/moduls/borang/kelulusan/add', [BorangController::class, 'tahapKelulusan_add']);
    Route::put('/moduls/borang/kelulusan/update', [BorangController::class, 'tahapKelulusan_update']);
    Route::delete('/moduls/borang/kelulusan/delete', [BorangController::class, 'tahapKelulusan_delete']);

    Route::get('/moduls/borang/suratKelulusan', [BorangController::class, 'surat_kelulusan']);
    Route::post('/moduls/borang/suratKelulusan/add', [BorangController::class, 'suratKelulusan_add']);
    Route::put('/moduls/borang/suratKelulusan/update', [BorangController::class, 'suratKelulusan_update']);
    Route::get('/moduls/borang/suratKelulusan/view', [BorangController::class, 'suratKelulusan_view']);

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
    Route::get('/user/borang_app/{borang_id}/{jawapan_id}/view/{level_app}', [BorangController::class, 'borangApp_view']);
    Route::get('/user/borang_app/pdf', [BorangController::class, 'borangApp_pdf']);
    Route::post('/user/borang_app/list/search', [BorangController::class, 'borangApp_search']);
    Route::post('/user/borang_app/update', [BorangController::class, 'borangApp_update']);
    Route::post('/user/borang_app/{borang_id}/lulusAll', [BorangController::class, 'borangApp_all']);

    Route::get('/user/sub_borang/list', [BorangController::class, 'subBorang_list']);
    Route::get('/user/sub_borang/{borang_id}/view', [BorangController::class, 'subBorang_view']);
    Route::get('/user/sub_borang/{borang_id}/edit', [BorangController::class, 'subBorang_edit']);
    Route::put('/user/sub_borang/update', [BorangController::class, 'subBorang_update']);

    Route::get('/user/project', [UserController::class, 'project_list']);
    Route::get('/user/project/{jawapan_id}', [UserController::class, 'project_view']);

    Route::get('/tarikDiri/{jawapan_id}', [UserController::class, 'viewTarik_diri']);
    Route::Post('/user/tarikDiri', [UserController::class, 'tarik_diri']);
    Route::put('/user/tarikDiri', [UserController::class, 'tarik_diri_update']);
    Route::delete('/user/tarikDiri/delete', [UserController::class, 'tarik_diri_delete']);

    Route::get('/tarik_Diri/List', [UserController::class, 'tarik_diri_list']);
    Route::get('/tarik_Diri/{tarikDiri_id}/details', [UserController::class, 'tarik_diri_details']);
    Route::PUT('/tarik_Diri/update', [UserController::class, 'tarik_diri_status']);
    
    Route::get('/tarik_Diri/force', [UserController::class, 'tarik_diri_view']);
    Route::Post('/tarik_Diri/add', [UserController::class, 'tarik_diri_paksa']);

    Route::get('/kemaskiniProjek/{jawapan_id}', [UserController::class, 'kemaskini_projek']);
    Route::get('/kemaskini/{ternakan_id}', [UserController::class, 'kemaskini_list']);
    Route::get('/kemaskini/{kemaskini_id}/jenis', [UserController::class, 'aktiviti_list']);
    Route::get('/kemaskini/aktiviti/list', [UserController::class, 'Param_list']);
    Route::post('/kemaskini/param/add', [UserController::class, 'KemasParam_add']);
    Route::put('/kemaskini/param/update', [UserController::class, 'KemasParam_update']);

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


    Route::get('/Aduan/List/Pegawai', [UserController::class, 'pegawaiAduan_list']);
    Route::put('/Aduan/Pegawai/tindakan', [UserController::class, 'pegawaiAduan_update']);
    
    Route::get('/Aduan/List', [UserController::class, 'aduan_list']);
    Route::post('/Aduan/add', [UserController::class, 'aduan_add']);
    Route::delete('/Aduan/delete', [UserController::class, 'aduan_delete']);

    Route::get('/Aduan/respon/{aduan_id}/list', [UserController::class, 'response_list']);
    Route::put('/Aduan/respon/update', [UserController::class, 'response_update']);

    Route::get('/user/tugasan/aduan/{aduan_id}/list', [UserController::class, 'userAduan_details']);
    Route::post('/user/tugasan/aduan/add', [UserController::class, 'userAduan_add']);
    Route::delete('/user/tugasan/aduan/delete', [UserController::class, 'userAduan_delete']);

    Route::get('/test', function () {
        return view('pengurusanBorang.TemplatePermohonanPerolehanIbuPejabatWilayah_');
    });

});

// Route::post('/Borang/uploadBorang',  [BorangController::class, 'uploadBorang']);