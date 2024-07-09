<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mockup\MockupDashboardController;
use App\Http\Controllers\Mockup\MockupEmployeeController;

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/mockup/dashboard', [MockupDashboardController::class, 'create'])->name('mockup.dashboard.create');
    Route::post('/mockup/company/store', [MockupDashboardController::class, 'store_company'])->name('mockup.company.store');
    Route::get('/mockup/dashboard/invitations', [MockupDashboardController::class, 'create_recv_invitations'])->name('mockup.invitations.create');
    Route::post('/mockup/dashboard/invitation/update', [MockupDashboardController::class, 'update_recv_invitation'])->name('mockup.invitation.update');
    Route::post('/mockup/dashboard/invitation/delete', [MockupDashboardController::class, 'delete_recv_invitation'])->name('mockup.invitation.delete');
});