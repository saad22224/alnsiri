<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\LawyerController;
use App\Http\Controllers\Auth\OtpAuthVerify;
use App\Http\Controllers\Auth\CheckEmailUser;
use App\Http\Controllers\Auth\CheckEmailLawyer;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\LaweyrRateController;
use App\Http\Controllers\Api\LaweyrAnswerController;
use App\Http\Controllers\Api\LawyerChanceController;
use App\Http\Controllers\Api\CheckEmailAuthController;
use App\Http\Controllers\Api\SpecialityController;
use App\Http\Controllers\Auth\MultiAuthController;
use App\Http\Controllers\Api\LawyerOfficeController;
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
Route::post('/login', [MultiAuthController::class, 'login']);
Route::prefix('user')->group(function () {
    Route::post('register', [UserController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('update-profile', [UserController::class, 'updateProfile']);
    Route::get('get-profile', [UserController::class, 'getProfile']);
    Route::get('check-email', [CheckEmailUser::class, 'checkEmail']);
});

Route::prefix('check-email')->group(function () {
    Route::get('check-email', [CheckEmailAuthController::class, 'checkEmail']);
});

Route::prefix('lawyer')->group(function () {
    Route::post('register', [LawyerController::class, 'register']);
    Route::post('login', [LawyerController::class, 'login']);
    Route::post('edit', [LawyerController::class, 'edit']);
    Route::post('verify-otp', [OtpAuthVerify::class, 'verifyOtp']);
    Route::post('send-otp', [OtpAuthVerify::class, 'sendOtp']);
    Route::post('login-with-otp', [OtpAuthVerify::class, 'loginWithOtp']);
    Route::get('check-email', [CheckEmailLawyer::class, 'checkEmail']);
    Route::post('create-lawyer-rate', [LaweyrRateController::class, 'createLawyerRate']);
    Route::get('get-lawyer-rate-by-lawyer-id/{lawyer_id}', [LaweyrRateController::class, 'getLawyerRateByLawyerId']);
    Route::get('get-all-rates', [LaweyrRateController::class, 'getAllRates']);
    Route::get('get-lawyer-chances-by-user-id/{user_id}', [LawyerChanceController::class, 'getLawyerChancesByUserId']);
    Route::get('get-lawyer-chances-by-lawyer-id/{lawyer_id}', [LawyerChanceController::class, 'getLawyerChancesByLawyerId']);
    Route::post('create-lawyer-chance', [LawyerChanceController::class, 'createLawyerChance']);
    Route::get('get-all-lawyer-chances', [LawyerChanceController::class, 'getAllLawyerChances']);
    Route::post('create-lawyer-office', [LawyerOfficeController::class, 'createLawyerOffice']);
    Route::get('get-all-lawyer-offices', [LawyerOfficeController::class, 'getAllLawyerOffices']);
    Route::get('get-lawyer-office-by-id/{id}', [LawyerOfficeController::class, 'getLawyerOfficeById']);
});

Route::prefix('question')->group(function () {
    Route::post('create', [QuestionController::class, 'createQuestion']);
    Route::get('index', [QuestionController::class, 'index']);
    Route::get('get-question-by-id/{id}', [QuestionController::class, 'getQuestionById']);
    Route::put('update/{id}', [QuestionController::class, 'updateQuestion']);
    Route::delete('delete/{id}', [QuestionController::class, 'deleteQuestion']);
    Route::get('get-questions-by-user-id/{user_id}', [QuestionController::class, 'getQuestionsByUserId']);
});
Route::prefix('answers')->group(function(){
    Route::post('store', [LaweyrAnswerController::class, 'store']);
    Route::get('get-answers-by-lawyer-id/{lawyer_id}', [LaweyrAnswerController::class, 'getAnswersByLawyerId']);
});
