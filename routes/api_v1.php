<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Global\AnnotationController;
use App\Http\Controllers\Api\Global\GlobalController;
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

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::apiResource('annotations', AnnotationController::class)->except('show');
    Route::prefix('global')->group(function () {
        Route::GET('departments',[GlobalController::class, 'departments']);
        Route::GET('speciality',[GlobalController::class, 'speciality']);
    });
});
