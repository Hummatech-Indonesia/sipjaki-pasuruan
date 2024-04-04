<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ServiceProviderQualificationController;
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
use App\Http\Controllers\TrainingController;
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
use App\Http\Controllers\ExecutorProjectController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\ContractCategoryController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ConsultantProjectController;
use App\Http\Controllers\SubClassificationController;
use App\Http\Controllers\WorkerCertificateController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\QualificationLevelController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\QualificationTrainingController;
use App\Http\Controllers\ClassificationTrainingController;
use App\Http\Controllers\ServiceProviderProjectController;
use App\Http\Controllers\SubClassificationTrainingController;
use App\Http\Controllers\QualificationLevelTrainingController;
use App\Http\Controllers\ServiceProvider\FoundingDeepController;
use App\Http\Controllers\ServiceProvider\AmendmentDeepController;
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



Route::get('/', [LandingController::class, 'news'])->name('landing-page');

Route::get('reset-passsword/{user}', [ResetPasswordController::class, 'index'])->name('reset.password');

Route::get('peraturan', [LandingController::class, 'rules'])->name('rules.landing');
Route::get('berita/{news}', [LandingController::class, 'show'])->name('berita');

Route::get('asosiasi', [AssociationController::class, 'dataServiceProvider'])->name('association.landing');
Route::get('detail-asosiasi/{association}', [LandingController::class, 'associationDetail'])->name('association-detail.landing');

Route::get('struktur-organisasi', function () {
    return view('struktur-organisasi');
})->name('struktur-organisasi');
Route::get('test', function () {
    return view('exports.consultant-package-pdf');
});

Route::get('rencana-strategis', function () {
    return view('rencana-strategis');
})->name('rencana-strategis');

Route::get('tugas-fungsi', function () {
    return view('tugas-fungsi');
})->name('tugas-fungsi');
Auth::routes(['verify' => true]);
// Route::middleware(['auth'])->group(function () {

Route::get('download-rule/{rule}', [RuleController::class, 'downloadRule']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('berita-terbaru', [LandingController::class, 'latestNews'])->name('berita-terbaru');

Route::get('/kecelakaan', [DinasController::class, 'accidentLandingPage'])->name('kecelakaan');

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
    Route::get('download-manual-book', function () {
        return view('pages.download-manual-book');
    })->name('download.manual.book');
    Route::get('profile', function () {
        return view('pages.profile');
    })->name('profile');

    Route::patch('update-profile', [UserController::class, 'updateProfile'])->name('update.profile');
    Route::patch('update-password', [UserController::class, 'updatePassword'])->name('update.password');

    Route::post('send-email', [ForgotPasswordController::class, 'sendEmail'])->name('send.email');

    Route::patch('reset-passsword', [ResetPasswordController::class, 'reset'])->name('reset.password.update');

    Route::patch('verify-account/{user}', [VerificationController::class, 'verifyToken'])->name('verify.account');

    Route::get('download-contract/{consultantProject}', [ConsultantProjectController::class, 'downloadContract'])->name('downloadContract');
    Route::get('download-administrative-minutes/{consultantProject}', [ConsultantProjectController::class, 'downloadAdministrativeMinutes'])->name('downloadAdministrativeMinutes');
    Route::get('download-report/{consultantProject}', [ConsultantProjectController::class, 'downloadReport'])->name('downloadReport');
    Route::get('download-minutes-of-disbursement/{consultantProject}', [ConsultantProjectController::class, 'downloadMinutesOfDisbursement'])->name('downloadMinutesOfDisbursement');
    Route::get('download-minutes-of-hand-over/{consultantProject}', [ConsultantProjectController::class, 'downloadMinutesOfHandOver'])->name('downloadMinutesOfHandOver');

    Route::get('download-executor-contract/{executorProject}', [ExecutorProjectController::class, 'downloadContract'])->name('downloadExecutorContract');
    Route::get('download-executor-administrative-minutes/{executorProject}', [ExecutorProjectController::class, 'downloadAdministrativeMinutes'])->name('downloadExecutorAdministrativeMinutes');
    Route::get('download-executor-report/{executorProject}', [ExecutorProjectController::class, 'downloadReport'])->name('downloadExecutorReport');
    Route::get('download-executor-minutes-of-disbursement/{executorProject}', [ExecutorProjectController::class, 'downloadMinutesOfDisbursement'])->name('downloadExecutorMinutesOfDisbursement');
    Route::get('download-uitzet-minutes/{executorProject}', [ExecutorProjectController::class, 'downloadUitzetMinutes'])->name('downloadUitzetMinutes');
    Route::get('download-mutual-check-0/{executorProject}', [ExecutorProjectController::class, 'downloadMutualCheck0'])->name('downloadMutualCheck0');
    Route::get('download-mutual-check-100/{executorProject}', [ExecutorProjectController::class, 'downloadMutualCheck100'])->name('downloadMutualCheck100');
    Route::get('download-mutual-check-0/{executorProject}', [ExecutorProjectController::class, 'downloadMutualCheck0'])->name('downloadMutualCheck0');
    Route::get('download-p1-meeting-minutes/{executorProject}', [ExecutorProjectController::class, 'downloadP1MeetingMinutes'])->name('downloadP1MeetingMinutes');
    Route::get('download-p2-meeting-minutes/{executorProject}', [ExecutorProjectController::class, 'downloadP2MeetingMinutes'])->name('downloadP2MeetingMinutes');

    Route::get('project-export', [ProjectController::class, 'export'])->name('project-export-excel');
    Route::get('print-project-pdf', [ProjectController::class, 'exportPdf'])->name('project-export-pdf');
    Route::get('export-pdf-consultant-project', [ConsultantProjectController::class, 'exportPdf'])->name('export.pdf.consultant.project');
    Route::get('export-excel-consultant-project', [ConsultantProjectController::class, 'exportExcel'])->name('export.excel.consultant.project');

    Route::resource('consultant-projects', ConsultantProjectController::class)->only(['show']);
    Route::get('detail-project/{executorProject}', [ProjectController::class, 'projectDetail'])->name('detail-project');
    Route::get('consultant-package', [ConsultantProjectController::class, 'consultantProject'])->name('consultant-package');
    Route::get('service-provider-project-detail/{service_provider_project}', [ServiceProviderProjectController::class, 'show'])->name('service.provider.project.detail');
    Route::get('worker-certificate/{worker}', [WorkerCertificateController::class, 'index'])->name('worker-certificate');
    Route::get('detail-service-provider-qualification/{service_provider_qualification}', [ServiceProviderQualificationController::class, 'show'])->name('service.provider.qualifications.detail');

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
            'types' => TypeController::class,
            'associations' => AssociationController::class,
            'qualification-trainings' => QualificationTrainingController::class,
        ]);
        Route::get('export-associations', [AssociationController::class, 'export']);

        Route::get('qualification-detail/{qualification}', [QualificationController::class, 'detail']);

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
            Route::delete('sub-qualifications/{qualification_level}', [QualificationLevelController::class, 'destroy'])->name('destroy');
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
    });

    Route::middleware('role:admin|superadmin|dinas')->group(function () {

        Route::get('detail-association/{association}', [AssociationController::class, 'show'])->name('association.detail');
        Route::get('detail-project-dinas/{project}', [ProjectController::class, 'detailProjectDinas']);
        Route::resource('consultant-projects', ConsultantProjectController::class)->only(['index']);
        Route::resource('executor-projects', ExecutorProjectController::class)->only(['index']);
        Route::get('training-members/{training}', [TrainingMemberController::class, 'index']);
        Route::post('training-members/{training}', [TrainingMemberController::class, 'store'])->name('training.members.store');
        Route::put('training-member-update/{training_member}', [TrainingMemberController::class, 'update'])->name('training.members');
        Route::delete('training-members/{training_member}', [TrainingMemberController::class, 'destroy']);
        Route::post('import-training-members', [TrainingMemberController::class, 'import']);
        Route::delete('delete-training-members', [TrainingMemberController::class, 'multipleDelete'])->name('delete-member');


        Route::get('training', [TrainingController::class, 'index'])->name('training');
        Route::post('training', [TrainingController::class, 'store'])->name('training.store');
        Route::put('training.update/{training}', [TrainingController::class, 'update'])->name('training.update');
        Route::delete('training.destroy/{training}', [TrainingController::class, 'destroy'])->name('training.destroy');
    });

    Route::middleware('role:dinas')->group(function () {
        Route::put('dinas', [DinasController::class, 'update'])->name('dinas.update');

        Route::get('dashboard-dinas', [DinasController::class, 'dashboard'])->name('dashboard-dinas');
        Route::get('profile-OPD', [DinasController::class, 'index']);
        Route::resource('accident', AccidentController::class)->except('create', 'edit');
        Route::delete('accident-destroy/{accident}', [AccidentController::class, 'destroy']);
        Route::get('accident-show/{accident}', [AccidentController::class, 'show']);
        Route::resource('consultant-projects', ConsultantProjectController::class)->except(['index', 'show']);
        Route::resource('executor-projects', ExecutorProjectController::class)->except(['index']);
    });

    Route::middleware('role:service provider')->group(function () {
        Route::put('upload-file-consultan/{project}', [ProjectController::class, 'uploadFileKonsultan'])->name('upload-file-consultan.update');
        Route::put('service-provider-qualifications/{serviceProviderQualification}', [ServiceProviderQualificationController::class, 'update'])->name('service.provider.qualifications.update');
        Route::post('service-provider-qualifications', [ServiceProviderQualificationController::class, 'store'])->name('service.provider.qualifications.store');
        Route::get('my-project', [ProjectController::class, 'myProject']);
        Route::get('history-project', [ProjectController::class, 'history']);
        Route::put('upload-file-executor/{executorProject}', [ExecutorProjectController::class, 'upload'])->name('upload-file-executor');
        Route::put('upload-file-consultant/{consultantProject}', [ConsultantProjectController::class, 'upload'])->name('upload-file-consultant');
        Route::put('mark-down-project/{executorProject}', [ExecutorProjectController::class, 'markDone'])->name('mark.done');
        Route::resources([
            'officers' => OfficerController::class,
            'verification-service-provider' => ServiceProviderVerificationController::class,
            'founding-deed' => FoundingDeepController::class,
            'amendment-deed' => AmendmentDeepController::class,
        ]);
        Route::post('consultant-project/{project}', [ConsultantProjectController::class, 'store'])->name('consultant-project.store');
        Route::put('consultant-project/{project}', [ConsultantProjectController::class, 'update'])->name('consultant-project.update');
        Route::post('service-provider-executor-projects/{project}', [ServiceProviderProjectController::class, 'store'])->name('service-provider-executor-projects.store');

        Route::post('worker-certificate/{worker}', [WorkerCertificateController::class, 'store'])->name('worker-certificate.store');
        Route::put('worker-certificate/{worker_certificate}', [WorkerCertificateController::class, 'update']);
        Route::delete('worker-certificate/{worker_certificate}', [WorkerCertificateController::class, 'destroy']);
        Route::get('worker-certificate-download/{worker_certificate}', [WorkerCertificateController::class, 'downloadCertificate'])->name('worker-certificate-download');

        Route::get('service-provider-profile', [ServiceProviderController::class, 'index'])->name('service-provider-profile');
        Route::put('update-business-entity', [ServiceProviderController::class, 'update'])->name('update-business-entity');
        Route::delete('service-provider-qualification/{service_provider_qualification}' , [ServiceProviderQualificationController::class, 'destroy']);
        Route::get('service-provider-projects', [ServiceProviderProjectController::class, 'index']);
        Route::post('service-provider-projects/{executorProject}', [ServiceProviderProjectController::class, 'store'])->name('service-provider-projects.store');
        Route::put('service-provider-projects/{service_provider_project}', [ServiceProviderProjectController::class, 'update'])->name('service-provider-projects.update');
        Route::delete('service-provider-projects/{service_provider_project}', [ServiceProviderProjectController::class, 'destroy'])->name('service-provider-projects.delete');

        Route::get('dashboard-service-provider', [ServiceProviderController::class, 'dashboard'])->name('dashboard-service-provider');
        Route::resource('workers', WorkerController::class)->only('index', 'update', 'destroy', 'store');
        Route::delete('delete-workers', [WorkerController::class, 'deleteMultiple'])->name('delete-workers');
        Route::post('workers/{service_provider}', [WorkerController::class, 'store']);

        Route::post('import-workers', [WorkerController::class, 'import'])->name('import.workers');
        Route::get('export-workers', [WorkerController::class, 'export'])->name('export.workers');

        Route::put('profile-service-providers', [ServiceProviderController::class, 'update']);
        Route::get('data-service-providers', [AssociationController::class, 'dataServiceProvider']);

        Route::get('work-package', [ServiceProviderProjectController::class, 'index'])->name('work.package');

        // download
        Route::get('download-all-service-provider-project/{project}', [ServiceProviderProjectController::class, 'downloadServiceProviderProject'])->name('download.all.service.provider.project');
        Route::get('download-service-provider-project/{service_provider_project}', [ServiceProviderProjectController::class, 'downloadFile'])->name('download.service-provider.project');
    });
});
Route::middleware('role:admin|superadmin')->group(function () {
    Route::get('service-provider-qualification-pending', [ServiceProviderQualificationController::class, 'pending'])->name('service.provider.qualification.pending');
    Route::get('detail-service-provider-qualification-pending/{service_provider_qualification}', [ServiceProviderQualificationController::class, 'detailPending'])->name('service.provider.qualification.pending.detail');
    Route::get('service-provider-qualification-reject-by-user', [ServiceProviderQualificationController::class, 'getReject'])->name('service.provider.qualification.reject.by.user');
    Route::patch('approve-service-provider-qualifications/{serviceProviderQualification}', [ServiceProviderQualificationController::class, 'approve']);
    Route::patch('reject-service-provider-qualifications/{serviceProviderQualification}', [ServiceProviderQualificationController::class, 'reject']);
    Route::delete('service-provider-qualifications/{serviceProviderQualification}', [ServiceProviderQualificationController::class, 'delete']);

    Route::get('all-service-provider', [ServiceProviderProjectController::class, 'allServiceProvider']);
    Route::get('verification', [VerificationController::class, 'index']);
    Route::post('verification', [VerificationController::class, 'store']);
    Route::get('detail-service-provider/{service_provider}', [ServiceProviderController::class, 'show'])->name('detail.service.provider');
    Route::get('service-provider-detail/{service_provider}', [ServiceProviderProjectController::class, 'projectDetail']);
    Route::patch('update-password-service-provider/{service_provider}', [ServiceProviderController::class, 'updatePassword']);
    Route::get('all-service-provider', [ServiceProviderProjectController::class, 'allServiceProvider'])->name('all.service.provider');
    Route::get('all-agency', [DinasController::class, 'all'])->name('all.agency');
    Route::get('service-provider-consultants', [ServiceProviderController::class, 'consultant']);
    Route::get('service-provider-executors', [ServiceProviderController::class, 'executor']);
    Route::delete('service-provider/{service_provider}', [ServiceProviderController::class, 'destroy'])->name('service-provider.destroy');
    Route::delete('service-provider', [ServiceProviderController::class, 'destroys'])->name('service-provider.destroys');


    //Training
    Route::get('training', [TrainingController::class, 'index'])->name('training');
    Route::post('training', [TrainingController::class, 'store'])->name('training.store');
    Route::put('training.update/{training}', [TrainingController::class, 'update'])->name('training.update');
    Route::delete('training.destroy/{training}', [TrainingController::class, 'destroy'])->name('training.destroy');

    //Training Member
    Route::get('training-members/{training}', [TrainingMemberController::class, 'index']);
    Route::post('training-members/{training}', [TrainingMemberController::class, 'store'])->name('training.members.store');
    Route::put('training-member-update/{training_member}', [TrainingMemberController::class, 'update'])->name('training.members');
    Route::delete('training-members/{training_member}', [TrainingMemberController::class, 'destroy']);
    Route::post('import-training-members', [TrainingMemberController::class, 'import']);
    Route::delete('delete-training-members', [TrainingMemberController::class, 'multipleDelete'])->name('delete-member');

    //Upload Foto
    Route::post('images', [ImagesController::class, 'store'])->name('images.store');

    // Route::resources([
    //     'news' => NewsController::class,
    //     'faqs' => FaqController::class
    // ]);
    Route::get('agencies', [UserController::class, 'index'])->name('agencies.index');
    Route::post('agencies', [UserController::class, 'store'])->name('agencies.store');
    Route::put('agencies/{user}', [UserController::class, 'update'])->name('agencies.update');
    Route::delete('agencies/{user}', [UserController::class, 'destroy'])->name('agencies.destroy');
    Route::get('images', [ImagesController::class, 'index'])->name('images.index');
    Route::post('images', [ImagesController::class, 'store'])->name('images.store');
    Route::post('videos', [ImagesController::class, 'storeVideo'])->name('video.store');

    Route::resources([
        'news' => NewsController::class,
        'faqs' => FaqController::class,
        'rules' => RuleController::class
    ]);
});


//Reset Password
Route::post('send-email-reset-passsword', [ForgotPasswordController::class, 'sendEmail'])->name('send.email.reset.passsword');
Route::put('reset-passsword-user/{user}', [ResetPasswordController::class, 'reset'])->name('reset.passsword.user');
Route::get('send-email', function () {
    return view('auth.send-email');
})->name('send.email.view');

// verify token
Route::get('/redirect-verify-account', [VerificationController::class, 'verifyAccount'])->name('redirect.verify.account');
Route::put('update-token/{user}', [VerificationController::class, 'updateToken']);
Route::put('verify-token/{user}', [VerificationController::class, 'verifyToken'])->name('verify.token/');
Route::get('verify-account/{user}', [VerificationController::class, 'verifyacount'])->name('verify.account/');
Route::post('resend-email-verification/{user}', [VerificationController::class, 'sendResend']);

// verifikasi account
// Route::get('verify.account/{id}', [VerificationController::class, 'verifyacount'])->name('verify.account');
Route::get('project-export', [ProjectController::class, 'export']);
Route::get('training-export', [TrainingController::class, 'export']);
Route::get('print-training', [TrainingController::class, 'exportPdf']);
Route::get('print-training-member', [TrainingMemberController::class, 'exportPdf']);
Route::get('training-member-export', [TrainingMemberController::class, 'export']);

Route::get('kalender', function () {
    return view('kalender');
});

require __DIR__ . '/arif.php';
require __DIR__ . '/ibnu.php';
require __DIR__ . '/femas.php';
