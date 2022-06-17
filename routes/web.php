<?php

use App\Http\Controllers\Admin\ACL\PlanProfileController;
use App\Http\Controllers\Admin\ACL\PermissionController;
use App\Http\Controllers\Admin\ACl\PermissionProfileController;
use App\Http\Controllers\Admin\ACL\ProfileController;
use App\Http\Controllers\Admin\DetailPlanController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {

        //Routes Plan x Profile

        Route::get('plans/{id}/profile/{idProfile}/detach', [PlanProfileController::class, 'detachProfilePlan'])->name('plans.profile.detach');
        Route::post('plans/{id}/profiles', [PlanProfileController::class, 'attachProfilesPlan'])->name('plans.profiles.attach');
        Route::any('plans/{id}/profiles/create', [PlanProfileController::class, 'profilesAvailable'])->name('plans.profiles.available');
        Route::get('plans/{id}/profiles', [PlanProfileController::class, 'profiles'])->name('plans.profiles');
        Route::get('profiles/{id}/plans', [PlanProfileController::class, 'plans'])->name('profiles.plans');

        //Routes Permission x Profile

        Route::get('profile/{id}/permission/{idPermission}/detach', [PermissionProfileController::class, 'detachPermissionProfile'])->name('profile.permissions.detach');
        Route::post('profile/{id}/permission', [PermissionProfileController::class, 'attachPermissionsProfile'])->name('profile.permissions.attach');
        Route::any('profile/{id}/permission/create', [PermissionProfileController::class, 'permissionsAvailable'])->name('profile.permissions.available');
        Route::get('profile/{id}/permission', [PermissionProfileController::class, 'permissions'])->name('profiles.permissions');
        Route::get('permission/{id}/profile', [PermissionProfileController::class, 'profiles'])->name('permissions.profiles');

        //Routes Permissions

        Route::any('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');
        Route::resource('permissions', PermissionController::class);

        //Routes Profiles

        Route::any('profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
        Route::resource('profiles', ProfileController::class);

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

Route::get('/plan/{url}', [SiteController::class, 'plan'])->name('plan.subscription');
Route::get('/', [SiteController::class, 'index'])->name('site.home');

// Route::get('/', function () {
//     return view('auth/login');
// });

Auth::routes();
