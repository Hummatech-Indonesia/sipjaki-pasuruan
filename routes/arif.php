<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('send-email', [ForgotPasswordController::class, 'sendEmail'])->name('send.email');

Route::patch('reset-passsword', [ResetPasswordController::class, 'reset'])->name('reset.password');

Route::patch('verify-account/{user}', [VerificationController::class, 'verifyToken'])->name('verify.account');

Route::post('update-profile', [UserController::class, 'updateProfile']);
