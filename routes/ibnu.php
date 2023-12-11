<?php

use Illuminate\Support\Facades\Route;

Route::get('detail-berita', function () {
    return view('detail-berita');
})->name('detail-berita');

Route::get('dashboard', function(){
    return view('pages.service-provider.dashboard');
})->name('dashboard-service-provider');

Route::get('work-package', function(){
    return view('pages.service-provider.work-package');
})->name('work-package');

Route::get('detail-work-package', function(){
    return view('pages.service-provider.detail-work-package');
})->name('detail-work-package');

Route::get('workforce', function(){
    return view('pages.service-provider.workforce');
})->name('workforce');
