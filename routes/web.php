<?php

use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\FiscalYearController;
use App\Http\Controllers\FundSourceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RuleCategoriesController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\sourceFundController;
use App\Http\Controllers\SubClassificationController;
use App\Http\Controllers\TrainingMethodController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/kategori-peraturan', function () {
    return view('pages.rule-category');
});


Route::get('/kategori-peraturan', function () {
    return view('pages.rule-category');
})->name('rule-category');


// Route::get('tahun-anggaran', function () {
//     return view('pages.fiscal-year');
// })->name('fiscal-year');

Route::get('KKNI', function () {
    return view('pages.qualification');
})->name('qualification');

// Route::get('/sumber-dana',function(){
//     return view('pages.source-fund');
// })->name('source-fund');

Route::get('/sumber-dana', function () {
    return view('pages.source-fund');
})->name('source-fund');

Route::resources([
    'source-fund' => sourceFundController::class,
    'rule-categories' => RuleCategoriesController::class,
    'fiscal-years' => FiscalYearController::class,
    'classifications' => ClassificationController::class,
    'news' => NewsController::class,
    'fund-sources' => FundSourceController::class,
    'sub-classifications' => SubClassificationController::class,
    'training-methods' => TrainingMethodController::class,
    'users' => UserController::class,
    'rules' => RuleController::class,
]);
