<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Individual\IndivDashboardController;

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [IndivDashboardController::class, 'create'])->name('individual.dashboard.create');
});