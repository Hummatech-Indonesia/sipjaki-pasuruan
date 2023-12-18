<?php

use App\Http\Controllers\AssociationController;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\ServiceProviderQualificationController;
use Illuminate\Support\Facades\Route;


Route::put('dinas', [DinasController::class, 'update'])->name('dinas.update');

Route::get('accident-chart', [DinasController::class, 'chart'])->name('accident.chart');
Route::get('export-associations', [AssociationController::class, 'export']);

Route::get('service-provider-qualifications', [ServiceProviderQualificationController::class, 'index']);
Route::post('service-provider-qualifications', [ServiceProviderQualificationController::class, 'store']);
Route::put('service-provider-qualifications/{serviceProviderQualification}', [ServiceProviderQualificationController::class, 'update']);
Route::patch('approve-service-provider-qualifications/{serviceProviderQualification}', [ServiceProviderQualificationController::class, 'approve']);
Route::delete('service-provider-qualifications/{serviceProviderQualification}', [ServiceProviderQualificationController::class, 'delete']);
