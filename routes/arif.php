<?php

use App\Http\Controllers\AssociationController;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceProvider\VerificationController;
use App\Http\Controllers\ServiceProviderQualificationController;
use Illuminate\Support\Facades\Route;


Route::put('dinas', [DinasController::class, 'update'])->name('dinas.update');

Route::get('export-associations', [AssociationController::class, 'export']);

Route::get('verification', [VerificationController::class, 'index']);
Route::post('verification', [VerificationController::class, 'store']);

Route::put('upload-file-consultan/{project}', [ProjectController::class, 'uploadFileKonsultan'])->name('upload-file-consultan.update');

Route::get('service-provider-qualifications', [ServiceProviderQualificationController::class, 'index'])->name('service.provider.qualifications');
Route::get('service-provider-qualification-active', [ServiceProviderQualificationController::class, 'active'])->name('service.provider.qualification.active');
Route::get('service-provider-qualification-pending', [ServiceProviderQualificationController::class, 'pending'])->name('service.provider.qualification.pending');
Route::get('service-provider-qualification-reject-by-user', [ServiceProviderQualificationController::class, 'getReject'])->name('service.provider.qualification.reject.by.user');
Route::post('service-provider-qualifications', [ServiceProviderQualificationController::class, 'store'])->name('service.provider.qualifications.store');
Route::get('detail-service-provider-qualification/{service_provider_qualification}', [ServiceProviderQualificationController::class, 'show'])->name('service.provider.qualifications.detail');
Route::put('service-provider-qualifications/{serviceProviderQualification}', [ServiceProviderQualificationController::class, 'update'])->name('service.provider.qualifications.update');
Route::patch('approve-service-provider-qualifications/{serviceProviderQualification}', [ServiceProviderQualificationController::class, 'approve']);
Route::patch('reject-service-provider-qualifications/{serviceProviderQualification}', [ServiceProviderQualificationController::class, 'reject']);
Route::delete('service-provider-qualifications/{serviceProviderQualification}', [ServiceProviderQualificationController::class, 'delete']);

Route::get('history-project', [ProjectController::class, 'history']);
Route::get('my-project', [ProjectController::class, 'myProject']);
