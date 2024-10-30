<?php

use App\Http\Controllers\Api\ApplicantController;
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


Route::prefix('global')->group(function () {
    Route::GET('departments',[GlobalController::class, 'departments']);
    Route::GET('speciality',[GlobalController::class, 'speciality']);
    Route::GET('sex',[GlobalController::class, 'sex']);
    Route::GET('edu_types',[GlobalController::class, 'eduTypes']);
    Route::GET('edu_langs',[GlobalController::class, 'eduLangs']);
    Route::GET('edu_forms',[GlobalController::class, 'eduForms']);
    Route::GET('app_types',[GlobalController::class, 'appTypes']);
    Route::GET('payment_types',[GlobalController::class, 'paymentTypes']);
    Route::GET('referrals',[GlobalController::class, 'referrals']);
});
Route::prefix('applicant')->group(function () {
    Route::get('/', [ApplicantController::class, 'index']);
    Route::POST('/phone_validation', [ApplicantController::class, 'phoneValidation']);
    Route::GET('/{applicant}', [ApplicantController::class, 'show']);
    Route::POST('/', [ApplicantController::class, 'store']);
    Route::PUT('/{applicant}', [ApplicantController::class, 'update']);
    Route::DELETE('/{applicant}', [ApplicantController::class, 'destroy']);
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::apiResource('annotations', AnnotationController::class)->except('show');

});
