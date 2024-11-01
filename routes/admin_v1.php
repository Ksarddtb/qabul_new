<?php

use App\Http\Controllers\Api\Admin\EducationFormController;
use App\Http\Controllers\Api\Admin\EducationLangController;
use App\Http\Controllers\Api\Admin\PermissionController;
use App\Http\Controllers\Api\Admin\RoleController;
use App\Http\Controllers\Api\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'auth:sanctum,permission:SuperAdmin'], function () {
        Route::apiResource('roles',RoleController::class);
        Route::apiResource('users',UserController::class);
        Route::apiResource('eduforms', EducationFormController::class);
        Route::apiResource('edulangs',EducationLangController::class);
        Route::POST('role/sync/{role}',[RoleController::class,'syncPermissions']);
        Route::GET('permission',[PermissionController::class,'index']);
});

