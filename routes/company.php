<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\CompanyDashboardController;
use App\Http\Controllers\Company\CompanyAnnouncementController;
use App\Http\Controllers\Company\CompanyBrandCreationController;
use App\Http\Controllers\ProfileController;

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/company/dashboard', [CompanyDashboardController::class, 'create'])->name('company.dashboard.create');

    
    Route::get('/company/announcement', [CompanyAnnouncementController::class, 'create'])->name('company.announcement.create');

    Route::get('/company/brand/create', [CompanyBrandCreationController::class, 'create'])->name('company.brand.create');
    Route::post('/company/brand/post', [CompanyBrandCreationController::class, 'store'])->name('company.brand.store');


    Route::get('/company/profile', [ProfileController::class, 'create_company'])->name('company.profile.create');
    Route::post('/company/profile/post', [ProfileController::class, 'update_company_timezone'])->name('company.timezone.update');
});