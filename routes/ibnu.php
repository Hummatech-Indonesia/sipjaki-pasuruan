<?php

use Illuminate\Support\Facades\Route;

Route::get('detail-berita', function () {
    return view('detail-berita');
})->name('detail-berita');
