<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\CompanyDashboardController;
use App\Http\Controllers\Company\CompanyAnnouncementController;
use App\Http\Controllers\ProfileController;

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/company/dashboard', [CompanyDashboardController::class, 'create'])->name('company.dashboard.create');

    
    Route::get('/company/announcement', [CompanyAnnouncementController::class, 'create'])->name('company.announcement.create');


    Route::get('/company/profile', [ProfileController::class, 'create_company'])->name('company.profile.create');
    Route::post('/company/profile/post', [ProfileController::class, 'update_company_timezone'])->name('company.timezone.update');
});