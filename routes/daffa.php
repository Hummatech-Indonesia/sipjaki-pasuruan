<?php

use App\Http\Controllers\AssociationController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\TrainingMemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Testing\Assert;

Route::get('/',[LandingController::class,'news'])->name('landing-page');
Route::get('berita-terbaru',[LandingController::class,'latestNews'])->name('berita-terbaru');
Route::get('berita/{news}',[LandingController::class,'show'])->name('berita');

Route::get('peraturan',[LandingController::class,'rules'])->name('rules.landing');

Route::delete('delete-workers',[ WorkerController::class, 'deleteMultiple'])->name('delete-workers');
Route::delete('delete-training-members',[ TrainingMemberController::class, 'multipleDelete'])->name('delete-member');

Route::get('asosiasi',[AssociationController::class,'dataServiceProvider'])->name('association.landing');
Route::get('detail-asosiasi/{association}',[LandingController::class,'associationDetail'])->name('association-detail.landing');

Route::resources([
    'workers' => WorkerController::class,
    'rules' => RuleController::class,
    
]);


Route::middleware(['role:admin'])->group(function () {
    Route::get('agencies', [UserController::class, 'index'])->name('agencies.index');
    Route::post('agencies', [UserController::class, 'store'])->name('agencies.store');
    Route::put('agencies/{user}', [UserController::class, 'update'])->name('agencies.update');
    Route::delete('agencies/{user}', [UserController::class, 'destroy'])->name('agencies.destroy');
    Route::resources([
        'news' => NewsController::class
    ]);

});


