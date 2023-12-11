<?php

use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\FiscalYearController;
use App\Http\Controllers\FundSourceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\QualificationLevelController;
use App\Http\Controllers\SubClassificationController;
use App\Http\Controllers\TrainingMethodController;
use Illuminate\Support\Facades\Route;

Route::middleware(['role:admin', 'role:dinas'])->group(function () {
    Route::get('list-fiscal-year', [FiscalYearController::class, 'listFiscalYear'])->name('list-fiscal-year');
        Route::get('list-fund-source', [FundSourceController::class, 'listFundSource'])->name('list-fund-source');

        Route::get('list-qualifications', [QualificationController::class, 'listQualifications'])->name('list-qualifications');
        Route::get('list-qualification-level/{qualification}', [QualificationLevelController::class, 'listQualificationLevel'])->name('list-qualification-level/');

        Route::get('list-classifications', [ClassificationController::class, 'listClassifications'])->name('list-classifications');
        Route::get('list-sub-classifications/{classification}', [SubClassificationController::class, 'listSubClassificcation'])->name('list-sub-classifications/');

        Route::get('list-training-method', [TrainingMethodController::class, 'listTrainingMethod'])->name('list-training-method');
        Route::get('list-projects', [ProjectController::class, 'listProjects'])->name('list-projects');
});
