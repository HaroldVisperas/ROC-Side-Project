<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Individual\IndivDashboardController;
use App\Http\Controllers\Individual\IndivCompanyCreationController;

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [IndivDashboardController::class, 'create'])->name('individual.dashboard.create');

    Route::get('/company/create', [IndivCompanyCreationController::class, 'create'])->name('individual.company.create');
    Route::post('/company/store', [IndivCompanyCreationController::class, 'store_company'])->name('individual.company.store');
});