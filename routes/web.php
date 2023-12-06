<?php

use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\ContractCategory;
use App\Http\Controllers\ContractCategoryController;
use App\Http\Controllers\FiscalYearController;
use App\Http\Controllers\FundSourceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\QualificationLevelController;
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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware('role:superadmin')->group(function () {
Route::get('/kategori-peraturan', function () {
    return view('pages.rule-category');
});

// Route::get('sub-classifications', function () {
//     return view('pages.classification.detail');
// })->name('sub-classifications');
Route::get('KKNI', function () {
    return view('pages.qualification');
})->name('qualification');
Route::get('sub-qualification', function () {
    return view('pages.sub-qualification');
})->name('sub-qualification');

Route::get('/sumber-dana', function () {
    return view('pages.source-fund');
})->name('source-fund');

Route::resources([
    'fund-sources' => FundSourceController::class,
    'qualifications' => QualificationController::class,
    'source-fund' => sourceFundController::class,
    'rule-categories' => RuleCategoriesController::class,
    'fiscal-years' => FiscalYearController::class,
    'classifications' => ClassificationController::class,
    'news' => NewsController::class,
    'training-methods' => TrainingMethodController::class,
    'users' => UserController::class,
    'rules' => RuleController::class,
]);

Route::get('sub-classifications/{classification}', [SubClassificationController::class, 'showSubClassification']);
Route::post('sub-classifications/{classification}', [SubClassificationController::class, 'store']);
Route::put('sub-classifications/{sub_classification}', [SubClassificationController::class, 'update']);
Route::delete('sub-classifications/{sub_classification}', [SubClassificationController::class, 'destroy']);

Route::get('KKNI', function () {
    return view('pages.qualification');
})->name('qualification');
Route::get('sub-qualification', function () {
    return view('pages.sub-qualification');
})->name('sub-qualification');

Route::get('sumber-dana', function () {
    return view('pages.source-fund');
})->name('source-fund');

Route::get('category-contract', function () {
    return view('pages.categoryContract');
})->name('category-contract');


Route::get('agencies',[UserController::class,'index'])->name('agencies.index');
Route::post('agencies',[UserController::class,'store'])->name('agencies.store');
Route::put('agencies/{user}',[UserController::class,'update'])->name('agencies.update');
Route::delete('agencies/{user}',[UserController::class,'destroy'])->name('agencies.update');


Route::resources([
    'category-contracts'=>ContractCategoryController::class,
    'fund-sources' => FundSourceController::class,
    'qualifications' => QualificationController::class,
    'sub-qualificationsLevel' => QualificationLevelController::class,
    'source-fund' => sourceFundController::class,
    'rule-categories' => RuleCategoriesController::class,
    'fiscal-years' => FiscalYearController::class,
    'classifications' => ClassificationController::class,
    'news' => NewsController::class,
    'sub-classifications' => SubClassificationController::class,
    'training-methods' => TrainingMethodController::class,
    'users' => UserController::class,
    'rules' => RuleController::class,
]);
Route::get('sub-classifications/{classification}', [SubClassificationController::class, 'showSubClassification']);
Route::post('sub-classifications/{classification}', [SubClassificationController::class, 'store']);
Route::put('sub-classifications/{sub_classification}', [SubClassificationController::class, 'update']);
Route::delete('sub-classifications/{sub_classification}', [SubClassificationController::class, 'destroy']);
