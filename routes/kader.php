<?php

use App\Http\Controllers\AccidentController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceProviderProjectController;
use App\Http\Controllers\SubClassificationController;
use App\Http\Controllers\TrainingMemberController;
use App\Http\Controllers\TrainingController;
use Illuminate\Support\Facades\Route;


//Reset Password
Route::get('reset-password/{id}', [ResetPasswordController::class ,'index'])->name('reset.password');
Route::post('send-email-reset-passsword', [ForgotPasswordController::class, 'sendEmail'])->name('send.email.reset.passsword');
Route::put('reset-passsword-user/{user}', [ResetPasswordController::class, 'reset'])->name('reset.passsword.user');
Route::get('send-email', function () { return view('auth.send-email'); })->name('send.email');

// accident
Route::get('accident', [AccidentController::class ,'index'])->name('accident');
Route::get('detail-accident-index', function () {return view('pages.dinas.detail-accident.index');})->name('detail.accident.index');

// Training
Route::get('training' , [TrainingController::class , 'index'])->name('training');
Route::post('training', [TrainingController::class , 'store'])->name('training.store');
Route::put('training.update/{training}', [TrainingController::class , 'update'])->name('training.update');
Route::delete('training.destroy/{training}', [TrainingController::class , 'destroy'])->name('training.destroy');

//Training Member
Route::get('training-members/{training}', [TrainingMemberController::class, 'index']);
Route::post('training-members/{training}', [TrainingMemberController::class, 'store'])->name('training.members');
// Route::put('training-members/{training_member}', [TrainingMemberController::class, 'update'])->name('training-member-update/');
// Route::delete('training-members/{training_member}', [TrainingMemberController::class, 'destroy'])->name('training-members/');

// verify token
Route::get('/redirect-verify-account', [VerificationController::class, 'verifyAccount'])->name('redirect.verify.account');
Route::put('update-token/{user}', [VerificationController::class, 'updateToken']);
Route::put('verify-token/{user}', [VerificationController::class, 'verifyToken'])->name('verify.token/');
Route::get('verify-account/{user}', [VerificationController::class, 'verifyacount'])->name('verify.account/');

// sub classification
Route::get('sub-qualification', function () { return view('pages.sub-qualification'); })->name('sub.qualification');

// verifikasi account
Route::get('verify.account/{id}' , [VerificationController::class ,'verifyacount'])->name('verify.account');
// verifikasi account

// pekerjaan
Route::get('work-package', [ServiceProviderProjectController::class, 'index'])->name('work.package');
Route::get('detail-project/{project}', [ProjectController::class, 'projectDetail']);
Route::get('service-provider-project-detail/{service_provider_project}', [ServiceProviderProjectController::class,'show'])->name('service.provider.project.detail');

// download
Route::get('download-all-service-provider-project/{project}' , [ServiceProviderProjectController::class ,'downloadServiceProviderProject'])->name('download.all.service.provider.project');
Route::get('download-service-provider-project/{service_provider_project}', [ServiceProviderProjectController::class, 'downloadFile'])->name('download.service-provider.project');

// service provider
Route::get('all-service-provider', [ServiceProviderProjectController::class, 'allServiceProvider'])->name('all.service.provider');

// Clasification training 
Route::get('classification-training', function () {
    return view('pages.classification.training');
})->name('classification.training');
Route::get('sub-classification-training', function () {
    return view('pages.classification.sub-training');
})->name('sub.classification.training');
Route::get('qualification-training', function () {
    return view('pages.qualification-training');
})->name('qualification.training');
Route::get('sub-qualification-training', function () {
    return view('pages.sub-qualification-training');
})->name('sub.qualification.training');
Route::get('all-agency' , [DinasController::class , 'all'])->name('all.agency');