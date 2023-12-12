<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AccidentController;
use App\Http\Controllers\FiscalYearController;
use App\Http\Controllers\FundSourceController;
use App\Http\Controllers\HistoryLoginController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\RuleCategoryController;
use App\Http\Controllers\TrainingMemberController;
use App\Http\Controllers\TrainingMethodController;
use App\Http\Controllers\ContractCategoryController;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\SubClassificationController;
use App\Http\Controllers\QualificationLevelController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ServiceProviderProjectController;
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
})->name('welcome');

Route::get('peraturan', function () {
    return view('peraturan');
})->name('peraturan');

Route::get('struktur-organisasi-DKSDK', function () {
    return view('struktur-organisasi');
})->name('struktur-organisasi');

Route::get('rencana-strategis-DKSDK', function () {
    return view('rencana-strategis');
})->name('rencana-strategis');

Route::get('tugas-fungsi-DKSDK', function () {
    return view('tugas-fungsi');
})->name('tugas-fungsi');
Auth::routes(['verify' => true]);
// Route::middleware(['auth'])->group(function () {

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/kecelakaan', function () {
    return view('kecelakaan');
})->name('kecelakaan');

Route::get('/bantuan', function () {
    return view('faq');
})->name('bantuan');

Route::get('data-paket-pekerjaan', [LandingController::class, 'project'])->name('paket-pekerjaan');
Route::get('data-paket-pekerjaan/{dinas}',[LandingController::class,'projectDetail'])->name('detail-project');
Route::get('/pelatihan', [LandingController::class, 'training'])->name('pelatihan');

Route::get('/opd', function () {
    return view('opd');
})->name('opd');


Route::middleware('auth')->group(function () {
    Route::middleware('role:superadmin')->group(function () {
        Route::resources([
            'contract-categories' => ContractCategoryController::class,
            'fund-sources' => FundSourceController::class,
            'qualifications' => QualificationController::class,
            'source-fund' => FundSourceController::class,
            'rule-categories' => RuleCategoryController::class,
            'fiscal-years' => FiscalYearController::class,
            'classifications' => ClassificationController::class,
            'news' => NewsController::class,
            'training-methods' => TrainingMethodController::class,
            'sections' => SectionController::class,
            'rules' => RuleController::class,
            'fields' => FieldController::class,
        ]);

        Route::get('history-login', [HistoryLoginController::class, 'index'])->name('history-login.index');
        Route::name('qualifications.level.')->group(function () {
            Route::post('sub-qualifications/{qualification}', [QualificationLevelController::class, 'store'])->name('store');
            Route::put('sub-qualifications/{qualification_level}', [QualificationLevelController::class, 'update'])->name('update');
            Route::delete('sub-qualifications/{qualification_level}', [QualificationLevelController::class, 'store'])->name('destroy');
        });

        Route::name('sub-classfication.')->group(function () {
            Route::get('sub-classifications/{classification}', [SubClassificationController::class, 'showSubClassification'])->name('index');
            Route::post('sub-classifications/{classification}', [SubClassificationController::class, 'store'])->name('store');
            Route::put('sub-classifications/{sub_classification}', [SubClassificationController::class, 'update'])->name('update');
            Route::delete('sub-classifications/{sub_classification}', [SubClassificationController::class, 'delete'])->name('destroy');
        });
    });

    Route::middleware('role:admin')->group(function () {
        Route::resources([
            'news' => NewsController::class,
        ]);
        Route::get('agencies', [UserController::class, 'index'])->name('agencies.index');
        Route::post('agencies', [UserController::class, 'store'])->name('agencies.store');
        Route::put('agencies/{user}', [UserController::class, 'update'])->name('agencies.update');
        Route::delete('agencies/{user}', [UserController::class, 'destroy'])->name('agencies.destroy');

        Route::get('images', [ImagesController::class, 'index']);
        Route::post('images', [ImagesController::class, 'store']);
        Route::put('images/{image}', [ImagesController::class, 'update']);
        Route::delete('images/{image}', [ImagesController::class, 'destroy']);

        Route::get('training-members/{training}', [TrainingMemberController::class, 'index']);
        Route::post('training-members/{training}', [TrainingMemberController::class, 'store']);
        Route::put('training-members/{training_member}', [TrainingMemberController::class, 'update']);
        Route::delete('training-members/{training_member}', [TrainingMemberController::class, 'destroy']);
        Route::post('import-training-members', [TrainingMemberController::class, 'import']);
    });

    Route::middleware('role:dinas')->group(function () {
        Route::resource('accident', AccidentController::class)->except('create', 'edit', 'show');
        Route::resources([
            'projects' => ProjectController::class
        ]);
    });
});

Route::get('service-provider-project-detail/{service_provider_project}', [ServiceProviderProjectController::class, 'show']);
Route::get('download-all-service-provider-project/{project}', [ServiceProviderProjectController::class, 'downloadServiceProviderProject']);

Route::middleware(['role:dinas'])->group(function () {
    Route::resource('accident', AccidentController::class)->except('create', 'show');
    Route::put('accident.update/{accident}', [AccidentController::class, 'update'])->name('accident.update/');
    Route::get('accident.show/{accident}', [AccidentController::class, 'show'])->name('accident.show/');
    Route::delete('accident.destroy/{accident}', [AccidentController::class, 'destroy'])->name('accident.destroy/');
    Route::resources([
        'projects' => ProjectController::class,
    ]);
    Route::middleware('role:service provider')->group(function () {
        Route::resource('workers', WorkerController::class)->only('index', 'update', 'destroy');
        Route::delete('delete-workers', [WorkerController::class, 'deleteMultiple']);
        Route::post('workers/{service_provider}', [WorkerController::class, 'store']);
    });
});

Route::get('profile-OPD', [DinasController::class, 'index']);
require __DIR__ . '/aldy.php';
require __DIR__ . '/arif.php';
require __DIR__ . '/daffa.php';
require __DIR__ . '/ibnu.php';
require __DIR__ . '/kader.php';
require __DIR__ . '/femas.php';
