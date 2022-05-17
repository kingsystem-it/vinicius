<?php

use App\Http\Controllers\Admin\DetailPlanController;
use App\Http\Controllers\Admin\PlanController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {


    //Route Details Plans

    Route::get('plan/{url}/details', [DetailPlanController::class, 'index'])->name('details.plan.index');
    Route::get('plan/{url}/details/create', [DetailPlanController::class, 'create'])->name('details.plan.create');
    Route::post('plan/{url}/details', [DetailPlanController::class, 'store'])->name('details.plan.store');
    Route::get('plan/{url}/details/{idDetail}/edit', [DetailPlanController::class, 'edit'])->name('details.plan.edit');
    Route::put('plan/{url}/details/{idDetail}', [DetailPlanController::class, 'update'])->name('details.plan.update');
    Route::get('plan/{url}/details/{idDetail}', [DetailPlanController::class, 'show'])->name('details.plan.show');
    Route::delete('plan/{url}/details/{idDetail}', [DetailPlanController::class, 'delete'])->name('details.plan.delete');

    //Routes Plans

    Route::post('plans', [PlanController::class, 'store'])->name('plans.store');
    Route::get('plans', [PlanController::class, 'index'])->name('plans.index');
    Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::get('plans/{url}', [PlanController::class, 'show'])->name('plans.show');
    Route::delete('plans/{url}', [PlanController::class, 'delete'])->name('plans.delete');
    Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::get('plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::put('plans/{url}', [PlanController::class, 'update'])->name('plans.update');

    //Home Dashboard

    Route::get('/', [PlanController::class, 'index'])->name('admin.index');
});



Route::get('/', function () {
    return view('welcome');
});
