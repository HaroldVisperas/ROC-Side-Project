<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\CompanyDashboardController;
use App\Http\Controllers\Company\CompanyAnnouncementController;
use App\Http\Controllers\Company\CompanyBrandCreationController;
use App\Http\Controllers\Company\CompanyEmployeeController;
use App\Http\Controllers\Company\CompanyBrandListController;
use App\Http\Controllers\Company\CompanyUserProfileController;

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/company/dashboard', [CompanyDashboardController::class, 'create'])->name('company.dashboard.create');

    Route::get('/company/announcement', [CompanyAnnouncementController::class, 'create'])->name('company.announcement.create');

    Route::get('/company/brand/create', [CompanyBrandCreationController::class, 'create'])->name('company.brand.create');
    Route::post('/company/brand/store', [CompanyBrandCreationController::class, 'store'])->name('company.brand.store');

    Route::get('/company/employee', [CompanyEmployeeController::class, 'create'])->name('company.employee.create');
    Route::post('/company/employee/update', [CompanyEmployeeController::class, 'update_employee'])->name('company.employee.update');
    Route::get('/company/employee/delete/{id}', [CompanyEmployeeController::class, 'delete_employee'])->name('company.employee.delete');
    Route::get('/company/employee/cancel', [CompanyEmployeeController::class, 'cancel_edit_employee'])->name('company.employee.cancel');
    Route::post('/company/employees/invite/store', [CompanyEmployeeController::class, 'store_invitation'])->name('company.employee.invite.store');
    Route::get('/company/employees/search', [CompanyEmployeeController::class, 'search_employee'])->name('company.employee.search');

    Route::get('/company/brands', [CompanyBrandListController::class, 'create'])->name('company.brands.create');
    Route::post('/company/brands/select', [CompanyBrandListController::class, 'select_brand'])->name('company.brands.select');

    Route::get('/company/profile', [CompanyUserProfileController::class, 'create'])->name('company.profile.create');
    Route::get('/company/profile/edit', [CompanyUserProfileController::class, 'edit'])->name('company.profile.edit');
    Route::post('/company/profile/update', [CompanyUserProfileController::class, 'update'])->name('company.profile.update');
    Route::post('/company/profile/password/update', [CompanyUserProfileController::class, 'update_password'])->name('company.profile.password.update');
});