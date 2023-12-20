<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AccidentController;
use App\Http\Controllers\FiscalYearController;
use App\Http\Controllers\FundSourceController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\HistoryLoginController;
use App\Http\Controllers\RuleCategoryController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\TrainingMemberController;
use App\Http\Controllers\TrainingMethodController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\ContractCategoryController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\SubClassificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\QualificationLevelController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\QualificationTrainingController;
use App\Http\Controllers\ClassificationTrainingController;
use App\Http\Controllers\ServiceProviderProjectController;
use App\Http\Controllers\SubClassificationTrainingController;
use App\Http\Controllers\QualificationLevelTrainingController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ServiceProvider\VerificationController as ServiceProviderVerificationController;


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

Route::get('download-rule/{rule}', [RuleController::class, 'downloadRule']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/kecelakaan', function () {
    return view('kecelakaan');
})->name('kecelakaan');

Route::get('bantuan', [LandingController::class, 'faq'])->name('bantuan');

Route::get('data-paket-pekerjaan', [LandingController::class, 'project'])->name('paket.pekerjaan');
Route::get('data-paket-pekerjaan/{dinas}', [LandingController::class, 'projectDetail'])->name('detail.project');
Route::get('/pelatihan', [LandingController::class, 'training'])->name('pelatihan');

Route::get('/opd', function () {
    return view('opd');
})->name('opd');

Route::get('json-classification-training', [ClassificationTrainingController::class, 'jsonClassificationTraining']);
Route::get('json-sub-classification-training/{classification_training}', [SubClassificationTrainingController::class, 'jsonSubClassificationTraining']);
Route::get('list-qualification-training', [QualificationTrainingController::class, 'jsonQualificationTraining']);
Route::get('json-qualification-level-training/{qualification_training}', [QualificationLevelTrainingController::class, 'jsonQualificationLevelTraining']);

Route::middleware('auth')->group(function () {
    Route::get('profile', function () {
        return view('pages.profile');
    })->name('profile');

    Route::patch('update-profile', [UserController::class, 'updateProfile'])->name('update.profile');
    Route::patch('update-password', [UserController::class, 'updatePassword'])->name('update.password');

    Route::post('send-email', [ForgotPasswordController::class, 'sendEmail'])->name('send.email');

    Route::patch('reset-passsword', [ResetPasswordController::class, 'reset'])->name('reset.password');

    Route::patch('verify-account/{user}', [VerificationController::class, 'verifyToken'])->name('verify.account');


    Route::middleware('role:superadmin|admin')->group(function () {
        Route::get('all-service-provider', [ServiceProviderProjectController::class, 'allServiceProvider']);
        Route::get('service-provider-detail/{service_provider}', [ServiceProviderProjectController::class, 'projectDetail']);
    });


    Route::middleware('role:superadmin')->group(function () {
        Route::get('dashboard-superadmin', [SuperadminController::class, 'dashboard'])->name('dashboard-superadmin');

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
            'rules' => RuleController::class,
            'types' => TypeController::class,
            'associations' => AssociationController::class,
            'qualification-trainings' => QualificationTrainingController::class,
        ]);

        Route::get('classification-training', [ClassificationTrainingController::class, 'index']);
        Route::post('classification-training', [ClassificationTrainingController::class, 'store'])->name('classification-training.store');
        Route::put('classification-training/{classification_training}', [ClassificationTrainingController::class, 'update']);
        Route::delete('classification-training/{classification_training}', [ClassificationTrainingController::class, 'destroy']);
        Route::resource('qualification-level-trainings', QualificationLevelTrainingController::class)->except('store');
        Route::get('qualification-level-training/{id}', [QualificationLevelTrainingController::class, 'index']);
        Route::post('qualification-level-trainings/{qualification_training}', [QualificationLevelTrainingController::class, 'store']);
        Route::put('qualification-level-trainings/{qualification_level_training}', [QualificationLevelTrainingController::class, 'update']);
        Route::delete('qualification-level-trainings/{qualification_level_training}', [QualificationLevelTrainingController::class, 'destroy']);
        Route::get('sub-clasification-training/{classification_training}', [SubClassificationTrainingController::class, 'index'])->name('sub-trainings.detail');
        Route::post('sub-clasification-training/store/{classification_training}', [SubClassificationTrainingController::class, 'store'])->name('sub-clasification-training.store');
        Route::put('sub-clasification-training/update/{sub_classification_training}', [SubClassificationTrainingController::class, 'update'])->name('sub-clasification-training.update');
        Route::delete('sub-clasification-training/delete/{sub_classification_training}', [SubClassificationTrainingController::class, 'destroy'])->name('sub-clasification-training.delete');


        Route::get('history-login', [HistoryLoginController::class, 'index'])->name('history-login.index');
        Route::delete('history-login/{history_login}', [HistoryLoginController::class, 'destroy'])->name('history-login.destroy');
        Route::delete('clear-history', [HistoryLoginController::class, 'clear'])->name('history-login.clear');
        Route::get('classification-trainings', [ClassificationTrainingController::class, 'index'])->name('classification-training.index');

        Route::name('qualifications.level.')->group(function () {
            Route::post('sub-qualifications/{qualification}', [QualificationLevelController::class, 'store'])->name('store');
            Route::put('sub-qualifications/{qualification_level}', [QualificationLevelController::class, 'update'])->name('update');
            Route::delete('sub-qualifications/{qualification_level}', [QualificationLevelController::class, 'store'])->name('destroy');
        });
        Route::name('sub-classfication.')->group(function () {
            Route::get('sub-classifications/{classification}', [SubClassificationController::class, 'showSubClassification'])->name('index');
            Route::post('sub-classifications/{classification}', [SubClassificationController::class, 'store'])->name('store');
            Route::put('sub-classifications/{sub_classification}', [SubClassificationController::class, 'update'])->name('update');
            Route::delete('sub-classifications/{sub_classification}', [SubClassificationController::class, 'destroy'])->name('destroy');
        });
        Route::post('import-associations', [AssociationController::class, 'import'])->name('import.assosiations');
    });

    Route::middleware('role:admin')->group(function () {
        Route::get('dashboard-admin', [AdminController::class, 'dashboard'])->name('dashboard-admin');
        Route::resources([
            'news' => NewsController::class,
            'faqs' => FaqController::class
        ]);
        Route::get('agencies', [UserController::class, 'index'])->name('agencies.index');
        Route::post('agencies', [UserController::class, 'store'])->name('agencies.store');
        Route::put('agencies/{user}', [UserController::class, 'update'])->name('agencies.update');
        Route::delete('agencies/{user}', [UserController::class, 'destroy'])->name('agencies.destroy');

        Route::get('images', function () {
            return view('pages.admin.input-image');
        })->name('images.index');
        Route::get('video', function () {
            return view('pages.admin.input-video');
        })->name('video.index');
        Route::post('images', [ImagesController::class, 'store'])->name('images.store');
        Route::post('videos', [ImagesController::class, 'storeVideo'])->name('video.store');

        Route::get('training-members/{training}', [TrainingMemberController::class, 'index']);
        Route::post('training-members/{training}', [TrainingMemberController::class, 'store'])->name('training.members');
        Route::put('training-member-update/{training_member}', [TrainingMemberController::class, 'update'])->name('training.members');
        Route::delete('training-members/{training_member}', [TrainingMemberController::class, 'destroy']);
        Route::post('import-training-members', [TrainingMemberController::class, 'import']);

        Route::get('training', [TrainingController::class, 'index'])->name('training');
        Route::post('training', [TrainingController::class, 'store'])->name('training.store');
        Route::put('training.update/{training}', [TrainingController::class, 'update'])->name('training.update');
        Route::delete('training.destroy/{training}', [TrainingController::class, 'destroy'])->name('training.destroy');
    });

    Route::middleware('role:dinas')->group(function () {
        Route::get('dashboard-dinas', [DinasController::class, 'dashboard'])->name('dashboard-dinas');
        Route::get('profile-OPD', [DinasController::class, 'index']);
        Route::resource('accident', AccidentController::class)->except('create', 'edit');
        Route::resources([
            'projects' => ProjectController::class
        ]);
    });

    Route::middleware('role:service provider')->group(function () {
        Route::resources([
            'officers' => OfficerController::class,
            'verification-service-provider'=>ServiceProviderVerificationController::class
        ]);

        Route::get('service-provider-profile', [ServiceProviderController::class, 'index'])->name('service-provider-profile');
        Route::put('update-business-entity', [ServiceProviderController::class, 'update'])->name('update-business-entity');

        Route::get('service-provider-projects', [ServiceProviderProjectController::class, 'index']);
        Route::post('service-provider-projects/{project}', [ServiceProviderProjectController::class, 'store'])->name('service-provider-projects.store');
        Route::put('service-provider-projects/{service_provider_project}', [ServiceProviderProjectController::class, 'update'])->name('service-provider-projects.update');
        Route::delete('service-provider-projects/{service_provider_project}', [ServiceProviderProjectController::class, 'destroy'])->name('service-provider-projects.delete');

        Route::get('dashboard-service-provider', [ServiceProviderController::class, 'dashboard'])->name('dashboard-service-provider');
        Route::resource('workers', WorkerController::class)->only('index', 'update', 'destroy');
        Route::delete('delete-workers', [WorkerController::class, 'deleteMultiple']);
        Route::post('workers/{service_provider}', [WorkerController::class, 'store']);

        Route::post('import-workers', [WorkerController::class, 'import'])->name('import.workers');
        Route::get('export-workers', [WorkerController::class, 'export'])->name('export.workers');

        Route::put('profile-service-providers', [ServiceProviderController::class, 'update']);
        Route::get('data-service-providers', [AssociationController::class, 'dataServiceProvider']);

        Route::get('work-package', [ServiceProviderProjectController::class, 'index'])->name('work.package');
        Route::get('detail-project/{project}', [ProjectController::class, 'projectDetail']);
        Route::get('service-provider-project-detail/{service_provider_project}', [ServiceProviderProjectController::class, 'show'])->name('service.provider.project.detail');

        // download
        Route::get('download-all-service-provider-project/{project}', [ServiceProviderProjectController::class, 'downloadServiceProviderProject'])->name('download.all.service.provider.project');
        Route::get('download-service-provider-project/{service_provider_project}', [ServiceProviderProjectController::class, 'downloadFile'])->name('download.service-provider.project');

        Route::get('service-provider-project-detail/{service_provider_project}', [ServiceProviderProjectController::class, 'show']);
    });
});
Route::middleware('role:admin|superadmin')->group(function () {
    Route::get('all-service-provider', [ServiceProviderProjectController::class, 'allServiceProvider'])->name('all.service.provider');
    Route::get('all-agency', [DinasController::class, 'all'])->name('all.agency');
});

//Reset Password
Route::get('reset-password/{id}', [ResetPasswordController::class, 'index'])->name('reset.password');
Route::post('send-email-reset-passsword', [ForgotPasswordController::class, 'sendEmail'])->name('send.email.reset.passsword');
Route::put('reset-passsword-user/{user}', [ResetPasswordController::class, 'reset'])->name('reset.passsword.user');
Route::get('send-email', function () {
    return view('auth.send-email');
})->name('send.email');

// verify token
Route::get('/redirect-verify-account', [VerificationController::class, 'verifyAccount'])->name('redirect.verify.account');
Route::put('update-token/{user}', [VerificationController::class, 'updateToken']);
Route::put('verify-token/{user}', [VerificationController::class, 'verifyToken'])->name('verify.token/');
Route::get('verify-account/{user}', [VerificationController::class, 'verifyacount'])->name('verify.account/');
Route::post('resend-email-verification/{user}', [VerificationController::class, 'sendResend']);

// verifikasi account
Route::get('verify.account/{id}', [VerificationController::class, 'verifyacount'])->name('verify.account');


require __DIR__ . '/aldy.php';
require __DIR__ . '/arif.php';
require __DIR__ . '/daffa.php';
require __DIR__ . '/ibnu.php';
require __DIR__ . '/kader.php';
require __DIR__ . '/femas.php';
