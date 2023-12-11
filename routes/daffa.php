<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('history-login',function () {
    return view('pages.history-login');
})->name('history-login.index');
Route::get('history-login',function () {
    return view('pages.history-login');
})->name('history-login.index');

Route::middleware(['role:admin'])->group(function () {
    Route::get('agencies', [UserController::class, 'index'])->name('agencies.index');
    Route::post('agencies', [UserController::class, 'store'])->name('agencies.store');
    Route::put('agencies/{user}', [UserController::class, 'update'])->name('agencies.update');
    Route::delete('agencies/{user}', [UserController::class, 'destroy'])->name('agencies.destroy');
    Route::resources([
        'news' => NewsController::class
    ]);

});


