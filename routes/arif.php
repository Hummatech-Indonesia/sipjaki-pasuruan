<?php

use App\Http\Controllers\AssociationController;
use App\Http\Controllers\DinasController;
use Illuminate\Support\Facades\Route;


Route::put('dinas', [DinasController::class, 'update'])->name('dinas.update');

Route::get('accident-chart', [DinasController::class, 'chart'])->name('accident.chart');

Route::post('import-associations', [AssociationController::class, 'import']);
Route::get('export-associations', [AssociationController::class, 'export']);
