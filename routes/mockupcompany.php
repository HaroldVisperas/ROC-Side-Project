<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mockup\MockupEmployeeController;

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/mockup/company/employees', [MockupEmployeeController::class, 'create'])->name('mockup.employees.create');
    Route::get('/mockup/company/employees/invite', [MockupEmployeeController::class, 'create_invitation'])->name('mockup.employees.create.invite');
    Route::post('/mockup/company/employees/invite/store', [MockupEmployeeController::class, 'store_invitation'])->name('mockup.employees.store.invite');
});