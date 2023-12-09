<?php

use App\Http\Controllers\AccidentController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\ContractCategoryController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\FiscalYearController;
use App\Http\Controllers\FundSourceController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\QualificationLevelController;
use App\Http\Controllers\RuleCategoriesController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\SubClassificationController;
use App\Http\Controllers\TrainingMemberController;
use App\Http\Controllers\TrainingMethodController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkerController;
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

Route::get('struktur-organisasi-DKSDK', function () {
    return view('struktur-organisasi');
});

Route::get('rencana-strategis-DKSDK', function () {
    return view('rencana-strategis');
});

Route::get('tugas-fungsi-DKSDK', function () {
    return view('tugas-fungsi');
});
Auth::routes(['verify' => true]);
// Route::middleware(['auth'])->group(function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tenaga-ahli', function () {
    return view('tenaga-ahli');
});

Route::get('/tenaga-terampil', function () {
    return view('tenaga-terampil');
});

Route::get('/kecelakaan', function () {
    return view('kecelakaan');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/data-paket-pekerjaan', function () {
    return view('dpp');
});

Route::get('/opd', function () {
    return view('opd');
});

// Route::middleware('role:superadmin')->group(function () {
Route::resources([
    'contract-categories' => ContractCategoryController::class,
    'fund-sources' => FundSourceController::class,
    'qualifications' => QualificationController::class,
    'source-fund' => FundSourceController::class,
    'rule-categories' => RuleCategoriesController::class,
    'fiscal-years' => FiscalYearController::class,
    'classifications' => ClassificationController::class,
    'news' => NewsController::class,
    'training-methods' => TrainingMethodController::class,
    'users' => UserController::class,
    'rules' => RuleController::class,
]);

// Route::middleware('role:superadmin')->group(function () {
Route::resources([
    'contract-categories' => ContractCategoryController::class,
    'fund-sources' => FundSourceController::class,
    'qualifications' => QualificationController::class,
    'source-fund' => FundSourceController::class,
    'rule-categories' => RuleCategoriesController::class,
    'fiscal-years' => FiscalYearController::class,
    'classifications' => ClassificationController::class,
    'news' => NewsController::class,
    'training-methods' => TrainingMethodController::class,
    'users' => UserController::class,
    'rules' => RuleController::class,
]);

Route::name('qualifications.level.')->group(function () {
    Route::post('sub-qualifications/{qualification}', [QualificationLevelController::class, 'store'])->name('store');
    Route::put('sub-qualifications/{qualification_level}', [QualificationLevelController::class, 'update'])->name('update');
    Route::delete('sub-qualifications/{qualification_level}', [QualificationLevelController::class, 'store'])->name('destroy');
});
// });

// Route::middleware('role:admin',)->group(function () {
Route::resources([
    'news' => NewsController::class,
]);
// });

    Route::middleware(['role:dinas'])->group(function () {
        Route::resource('accident', AccidentController::class)->except('create', 'edit', 'show');
        Route::resources([
            'projects' => ProjectController::class
        ]);

        Route::get('list-fiscal-year', [FiscalYearController::class, 'listFiscalYear'])->name('list-fiscal-year');
        Route::get('list-fund-source', [FundSourceController::class, 'listFundSource'])->name('list-fund-source');

        Route::get('list-qualifications', [QualificationController::class, 'listQualifications'])->name('list-qualifications');
        Route::get('list-qualification-level/{qualification}', [QualificationLevelController::class, 'listQualificationLevel'])->name('list-qualification-level/');

        Route::get('list-classifications', [ClassificationController::class, 'listClassifications'])->name('list-classifications');
        Route::get('list-sub-classifications/{classification}', [SubClassificationController::class, 'listSubClassificcation'])->name('list-sub-classifications/');

        Route::get('list-training-method', [TrainingMethodController::class, 'listTrainingMethod'])->name('list-training-method');
        Route::get('list-projects', [ProjectController::class, 'listProjects']);
    });

    // Route::middleware('role:service provider',function(){
    // });
// Route::middleware('role:dinas',function(){
//     // Accident
// });

Route::middleware(['role:dinas'])->group(function () {
    Route::resource('accident', AccidentController::class)->except('create', 'edit', 'show');
    Route::resources([
        'projects' => ProjectController::class,
        'fields' => FieldController::class
    ]);
});

// Route::middleware('role:service provider',function(){
// });

Route::get('agencies', [UserController::class, 'index'])->name('agencies.index');
Route::post('agencies', [UserController::class, 'store'])->name('agencies.store');
Route::put('agencies/{user}', [UserController::class, 'update'])->name('agencies.update');
Route::delete('agencies/{user}', [UserController::class, 'destroy'])->name('agencies.destroy');

Route::get('test', function () {
    return view('auth.verify');
});

// });

Route::get('images', [ImagesController::class, 'index']);
Route::post('images', [ImagesController::class, 'store']);
Route::put('images/{image}', [ImagesController::class, 'update']);
Route::delete('images/{image}', [ImagesController::class, 'destroy']);

Route::get('profile-OPD', function () {
    return view('pages.profile-opd');
});


//Training Member
Route::get('training-members/{training}', [TrainingMemberController::class, 'index']);
Route::post('training-members/{training}', [TrainingMemberController::class, 'store']);
Route::put('training-members/{training_member}', [TrainingMemberController::class, 'update']);
Route::delete('training-members/{training_member}', [TrainingMemberController::class, 'destroy']);
Route::post('import-training-members', [TrainingMemberController::class, 'import']);
Route::resource('worker', WorkerController::class)->only('index', 'update', 'destroy');
Route::post('worker/{service_provider}', [WorkerController::class, 'store']);



require __DIR__.'/aldy.php';
require __DIR__.'/arif.php';
require __DIR__.'/daffa.php';
require __DIR__.'/ibnu.php';
require __DIR__.'/kader.php';
require __DIR__.'/femas.php';
