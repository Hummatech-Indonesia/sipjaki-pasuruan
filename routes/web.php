<?php

use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\FundSourceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RuleCategoriesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('training-methods', function () {
    return view('methods.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/kategori-peraturan',function(){
    return view('pages.rule-category');
})->name('rule-category');
Route::get('tahun-anggaran',function(){
    return view('pages.fiscal-year');
})->name('fiscal-year');
Route::resources([
    'classifications' => ClassificationController::class,
    'news' => NewsController::class,
    'rule-categories' => RuleCategoriesController::class,
    'fund-sources' => FundSourceController::class,
]);
