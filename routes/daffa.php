<?php

use Illuminate\Support\Facades\Route;

Route::get('history-login',function () {
    return view('pages.history-login');
})->name('history-login.index');