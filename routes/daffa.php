<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Route;

Route::get('/',[LandingController::class,'news'])->name('landing-page');
Route::get('berita-terbaru',[LandingController::class,'latestNews'])->name('berita-terbaru');
Route::get('berita/{news}',[LandingController::class,'show'])->name('berita');
Route::get('peraturan',[LandingController::class,'rules'])->name('rules.landing');
Route::delete('delete-workers',[ WorkerController::class, 'deleteMultiple'])->name('delete-workers');
Route::resources([
    'workers' => WorkerController::class,
    'rules' => RuleController::class
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


