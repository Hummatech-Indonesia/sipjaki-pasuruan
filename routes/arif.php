<?php

use App\Http\Controllers\AssociationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\ServiceProviderProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkerController;
use App\Models\Worker;
use Illuminate\Support\Facades\Route;

Route::post('send-email', [ForgotPasswordController::class, 'sendEmail'])->name('send.email');

Route::patch('reset-passsword', [ResetPasswordController::class, 'reset'])->name('reset.password');

Route::patch('verify-account/{user}', [VerificationController::class, 'verifyToken'])->name('verify.account');

Route::patch('update-profile', [UserController::class, 'updateProfile'])->name('update.profile');
Route::patch('update-password', [UserController::class, 'updatePassword'])->name('update.password');

Route::get('service-provider-projects', [ServiceProviderProjectController::class, 'index']);
Route::post('service-provider-projects/{project}', [ServiceProviderProjectController::class, 'store'])->name('service-provider-projects/');
Route::put('service-provider-projects/{service_provider_project}', [ServiceProviderProjectController::class, 'update'])->name('service-provider-projects/');
Route::delete('service-provider-projects/{service_provider_project}', [ServiceProviderProjectController::class, 'destroy'])->name('/service-provider-projects/');

Route::post('import-workers', [WorkerController::class, 'import'])->name('import.workers');
Route::get('export-workers', [WorkerController::class, 'export'])->name('export.workers');
Route::put('dinas', [DinasController::class, 'update'])->name('dinas.update');

Route::get('accident-chart', [DinasController::class, 'chart'])->name('accident.chart');

Route::get('associations', [AssociationController::class, 'index'])->name('asscoation');
Route::post('associations', [AssociationController::class, 'store'])->name('asscoation.store');
Route::put('associations/{association}', [AssociationController::class, 'update'])->name('asscoation.update');
