<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\ServiceProviderQualificationController;
use Illuminate\Support\Facades\Route;

Route::get('service-provider-qualifications', [ServiceProviderQualificationController::class, 'index'])->name('service.provider.qualifications');
Route::get('service-provider-qualification-active', [ServiceProviderQualificationController::class, 'active'])->name('service.provider.qualification.active');

Route::get('image-landing-page', [LandingController::class, 'image']);
