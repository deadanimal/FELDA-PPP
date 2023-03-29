<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::post('/login', [ApiController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {  

    Route::get('/projects', [ApiController::class, 'list_projects']);
    Route::post('/projects/search', [ApiController::class, 'search_project']);    
    Route::get('/projects/{project_id}', [ApiController::class, 'get_project']);    
    Route::post('/reports', [ApiController::class, 'update_report']);  
    Route::get('/notifications', [ApiController::class, 'list_notifications']);      
    Route::get('/tasks', [ApiController::class, 'list_tasks']);     
    Route::get('/sitevisits', [ApiController::class, 'list_sitevisits']);        
    Route::post('/sitevisits', [ApiController::class, 'create_sitevisit']);      

});
