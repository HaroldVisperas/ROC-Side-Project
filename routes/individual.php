<?php

use App\Http\Controllers\Individual\IndivDashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [IndivDashboardController::class, 'create'])->name('individual.dashboard');
});