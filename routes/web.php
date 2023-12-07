<?php

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\ContractCategory;
use App\Http\Controllers\ContractCategoryController;
use App\Http\Controllers\FiscalYearController;
use App\Http\Controllers\FundSourceController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\QualificationLevelController;
use App\Http\Controllers\RuleCategoriesController;
use App\Http\Controllers\RuleController;
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
Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Route::middleware('role:superadmin')->group(function () {

    Route::get('sub-qualification', function () {
        return view('pages.sub-qualification');
    })->name('sub-qualification');


    Route::resources([
        'fund-sources' => FundSourceController::class,
        'qualifications' => QualificationController::class,
        'source-fund' => FundSourceController::class,
        'sub-qualificationsLevel' => QualificationLevelController::class,
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

    Route::get('agencies', [UserController::class, 'index'])->name('agencies.index');
    Route::post('agencies', [UserController::class, 'store'])->name('agencies.store');
    Route::put('agencies/{user}', [UserController::class, 'update'])->name('agencies.update');
    Route::delete('agencies/{user}', [UserController::class, 'destroy'])->name('agencies.update');

    Route::get('test', function () {
        return view('auth.verify');
    });
    Route::get('/redirect-verify-account', [VerificationController::class, 'verifyAccount'])->name('redirect.verify.account');
    Route::put('update-token/{user}', [VerificationController::class, 'updateToken']);
    Route::put('verify-token/{user}', [VerificationController::class, 'verifyToken']);

    Route::get('/verify-account', function () {
        return view('auth.verify-account');
    })->name('verify.account');
});

Route::get('images', [ImagesController::class, 'index']);
Route::post('images', [ImagesController::class, 'store']);
Route::put('images/{image}', [ImagesController::class, 'update']);
Route::delete('images/{image}', [ImagesController::class, 'destroy']);


//Reset Password
Route::post('send-email-reset-passsword', [ResetPasswordController::class, 'sendEmail']);
Route::get('profile-OPD', function () {
    return view('pages.profile-opd');
});
