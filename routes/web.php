<?php

use App\Http\Controllers\AccidentController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\ContractCategoryController;
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
Auth::routes(['verify' => true]);
// Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/tenaga-ahli',function(){
        return view('tenaga-ahli');
    });

    Route::get('/tenaga-terampil',function(){
        return view('tenaga-terampil');
    });

    Route::get('/kecelakaan',function(){
        return view('kecelakaan');
    });

    Route::get('/faq',function(){
        return view('faq');
    });

    Route::get('/data-paket-pekerjaan',function(){
        return view('dpp');
    });

    Route::get('/opd',function(){
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

        Route::name('qualifications.level.')->group(function(){
            Route::post('sub-qualifications/{qualification}',[QualificationLevelController::class,'store'])->name('store');
            Route::put('sub-qualifications/{qualification_level}',[QualificationLevelController::class,'update'])->name('update');
            Route::delete('sub-qualifications/{qualification_level}',[QualificationLevelController::class,'store'])->name('destroy');
        });
    // });

    // Route::middleware('role:admin',)->group(function () {
        Route::resources([
            'news' => NewsController::class,
        ]);
    // });

    Route::middleware('role:dinas',function(){
        // Accident
        Route::resource('accident', AccidentController::class)->except('create', 'edit', 'show');
    });

    Route::middleware(['role:dinas'])->group(function () {
        Route::resources([
            'projects' => ProjectController::class
        ]);
    });

    // Route::middleware('role:service provider',function(){
    // });

    Route::get('sub-qualification', function () {
        return view('pages.sub-qualification');
    })->name('sub-qualification');


    Route::resources([
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
    Route::get('sub-classifications/{classification}', [SubClassificationController::class, 'showSubClassification']);
    Route::post('sub-classifications/{classification}', [SubClassificationController::class, 'store']);
    Route::put('sub-classifications/{sub_classification}', [SubClassificationController::class, 'update']);
    Route::delete('sub-classifications/{sub_classification}', [SubClassificationController::class, 'destroy']);


    Route::get('agencies', [UserController::class, 'index'])->name('agencies.index');
    Route::post('agencies', [UserController::class, 'store'])->name('agencies.store');
    Route::put('agencies/{user}', [UserController::class, 'update'])->name('agencies.update');
    Route::delete('agencies/{user}', [UserController::class, 'destroy'])->name('agencies.destroy');

    Route::get('test', function () {
        return view('auth.verify');
    });

    Route::get('accident', function () {
        return view('pages.dinas.accident');
    })->name('accident');
    Route::get('reset-password/{id}' , [ResetPasswordController::class , 'index'])->name('reset-password/');
    Route::get('send-email', function () {
        return view('auth.send-email');
    })->name('send-email');

    Route::get('/redirect-verify-account', [VerificationController::class, 'verifyAccount'])->name('redirect.verify.account');
    Route::put('update-token/{user}', [VerificationController::class, 'updateToken']);
    Route::put('verify-token/{user}', [VerificationController::class, 'verifyToken']);

    Route::get('/verify-account/{user}', function () {
        return view('auth.verify-account');
    })->name('verify.account/');
    Route::get('training', function () {
        return view('pages.dinas.training');
    })->name('training');
// });

Route::get('images', [ImagesController::class, 'index']);
Route::post('images', [ImagesController::class, 'store']);
Route::put('images/{image}', [ImagesController::class, 'update']);
Route::delete('images/{image}', [ImagesController::class, 'destroy']);

Route::get('profile-OPD', function () {
    return view('pages.profile-opd');
});

//Reset Password
Route::post('send-email-reset-passsword', [ForgotPasswordController::class, 'sendEmail'])->name('send-email-reset-passsword');
Route::put('reset-passsword-user/{user}', [ResetPasswordController::class, 'reset'])->name('reset-passsword-user/');


//Training Member
Route::get('training-members/{training}', [TrainingMemberController::class, 'index']);
Route::post('training-members/{training}', [TrainingMemberController::class, 'store']);
Route::put('training-members/{training_member}', [TrainingMemberController::class, 'update']);
Route::delete('training-members/{training_member}', [TrainingMemberController::class, 'destroy']);
Route::post('import-training-members', [TrainingMemberController::class, 'import']);
