<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\SubClassificationController;
use App\Http\Controllers\TrainingController;
use Illuminate\Support\Facades\Route;

//Reset Password
Route::get('reset-password/{id}', [ResetPasswordController::class ,'index'])->name('reset-password/');
Route::post('send-email-reset-passsword', [ForgotPasswordController::class, 'sendEmail'])->name('send-email-reset-passsword');
Route::put('reset-passsword-user/{user}', [ResetPasswordController::class, 'reset'])->name('reset-passsword-user/');
Route::get('send-email', function () { return view('auth.send-email'); })->name('send-email');

// accident
Route::get('accident', function () {return view('pages.dinas.accident');})->name('accident');
Route::get('detail-accident.index', function () {return view('pages.dinas.detail-accident.index');})->name('detail-accident.index');

// Training
Route::get('training' , [TrainingController::class , 'index'])->name('training');
Route::post('training', [TrainingController::class , 'store'])->name('training.store');
Route::put('training/{training}', [TrainingController::class , 'update'])->name('training.update/');
Route::delete('training.destroy/{training}', [TrainingControllerController::class , 'destroy'])->name('training.destroy/');

// verify token 
Route::get('/redirect-verify-account', [VerificationController::class, 'verifyAccount'])->name('redirect.verify.account');
Route::put('update-token/{user}', [VerificationController::class, 'updateToken']);
Route::put('verify-token/{user}', [VerificationControllerationController::class, 'verifyToken'])->name('verify-token/');
Route::get('verify-account/{user}', [VerificationController::class, 'verifyacount']);

// sub classification 
Route::get('sub-classifications/{classification}', [SubClassificationController::class, 'showSubClassification']);
Route::post('sub-classifications/{classification}', [SubClassificationController::class, 'store']);
Route::put('sub-classifications/{sub_classification}', [SubClassificationController::class, 'update']);
Route::delete('sub-classifications/{sub_classification}', [SubClassificationController::class, 'delete']);
Route::get('sub-qualification', function () { return view('pages.sub-qualification'); })->name('sub-qualification');