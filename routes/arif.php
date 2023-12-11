<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Route;

Route::post('send-email', [ForgotPasswordController::class, 'sendEmail'])->name('send.email');

Route::put('reset-passsword', [ResetPasswordController::class, 'reset'])->name('reset.password');

Route::put('verify-account/{user}', [VerificationController::class, 'verifyToken'])->name('verify.account');
