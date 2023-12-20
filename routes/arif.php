<?php

use App\Http\Controllers\AssociationController;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceProvider\VerificationController;
use App\Http\Controllers\ServiceProviderQualificationController;
use Illuminate\Support\Facades\Route;


Route::put('dinas', [DinasController::class, 'update'])->name('dinas.update');

Route::get('accident-chart', [DinasController::class, 'chart'])->name('accident.chart');
Route::get('export-associations', [AssociationController::class, 'export']);

Route::get('verification', [VerificationController::class, 'index']);
Route::post('verification', [VerificationController::class, 'store']);

Route::put('upload-file-consultan/{project}', [ProjectController::class, 'uploadFileKonsultan'])->name('upload-file-consultan.update');

Route::get('service-provider-qualifications', [ServiceProviderQualificationController::class, 'index'])->name('service.provider.qualifications');
Route::get('service-provider-qualification-active', [ServiceProviderQualificationController::class, 'active'])->name('service.provider.qualification.active');
Route::post('service-provider-qualifications', [ServiceProviderQualificationController::class, 'store'])->name('service.provider.qualifications.store');
Route::put('service-provider-qualifications/{serviceProviderQualification}', [ServiceProviderQualificationController::class, 'update']);
Route::patch('approve-service-provider-qualifications/{serviceProviderQualification}', [ServiceProviderQualificationController::class, 'approve']);
Route::patch('reject-service-provider-qualifications/{serviceProviderQualification}', [ServiceProviderQualificationController::class, 'reject']);
Route::delete('service-provider-qualifications/{serviceProviderQualification}', [ServiceProviderQualificationController::class, 'delete']);

Route::get('history-project', [ProjectController::class, 'history']);
Route::get('my-project', [ProjectController::class, 'myProject']);

