<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Individual\IndivDashboardController;
use App\Http\Controllers\Individual\IndivCompanyCreationController;
use App\Http\Controllers\Individual\IndivUserProfileController;

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [IndivDashboardController::class, 'create'])->name('individual.dashboard.create');
    Route::post('/dashboard/invitation/update', [IndivDashboardController::class, 'update_invitation'])->name('individual.invitation.update');
    Route::post('/dashboard/invitation/delete', [IndivDashboardController::class, 'delete_invitation'])->name('individual.invitation.delete');

    Route::get('/company/create', [IndivCompanyCreationController::class, 'create'])->name('individual.company.create');
    Route::post('/company/store', [IndivCompanyCreationController::class, 'store_company'])->name('individual.company.store');

    Route::get('/individual/profile', [IndivUserProfileController::class, 'create'])->name('individual.profile.create');
    Route::get('/individual/profile/edit', [IndivUserProfileController::class, 'edit'])->name('individual.profile.edit');
    Route::post('/individual/profile/update', [IndivUserProfileController::class, 'update'])->name('individual.profile.update');
    Route::post('/individual/profile/password/update', [IndivUserProfileController::class, 'update_password'])->name('individual.profile.password.update');
});