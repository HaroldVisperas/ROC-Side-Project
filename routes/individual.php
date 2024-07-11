<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Individual\IndivDashboardController;
use App\Http\Controllers\Individual\IndivCompanyCreationController;
use App\Http\Controllers\Individual\IndivUserProfileController;

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [IndivDashboardController::class, 'create'])->name('individual.dashboard.create');

    Route::get('/company/create', [IndivCompanyCreationController::class, 'create'])->name('individual.company.create');
    Route::post('/company/store', [IndivCompanyCreationController::class, 'store_company'])->name('individual.company.store');

    Route::get('/individual/profile', [IndivUserProfileController::class, 'create'])->name('individual.profile.create');
    Route::post('/individual/profile/store', [IndivUserProfileController::class, 'update'])->name('individual.profile.update');
});