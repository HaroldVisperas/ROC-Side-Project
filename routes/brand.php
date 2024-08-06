<?php

// brand.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Brand\BrandDashboardController;
use App\Http\Controllers\Brand\BrandTaskController;
use App\Http\Controllers\Brand\BrandAssetController;
use App\Http\Controllers\Brand\BrandProfileController;
use App\Http\Controllers\Brand\BrandUserProfileController;
use App\Http\Controllers\Brand\BrandPaymentMethodController;
use App\Http\Controllers\Brand\BrandProofOfPaymentController;
use App\Http\Controllers\Brand\BrandEmployeeController;
use App\Http\Controllers\Brand\BrandTicketController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/brand/dashboard', [BrandDashboardController::class, 'create'])->name('brand.dashboard.create');

    Route::get('/brand/tasks', [BrandTaskController::class, 'create'])->name('brand.tasks.create');
    Route::post('/brand/tasks/store', [BrandTaskController::class, 'store'])->name('brand.tasks.store');
    Route::put('/brand/tasks/update/{task}', [BrandTaskController::class, 'update'])->name('brand.tasks.update');
    Route::delete('/brand/tasks/delete/{task}', [BrandTaskController::class, 'delete'])->name('brand.tasks.delete');

    Route::get('/brand/assets', [BrandAssetController::class, 'create'])->name('brand.assets.create');
    Route::post('/brand/assets/color/store', [BrandAssetController::class, 'store_color'])->name('brand.assets.color.store');
    Route::post('/brand/assets/image/store', [BrandAssetController::class, 'store_image'])->name('brand.assets.image.store');
    Route::post('/brand/assets/color/delete', [BrandAssetController::class, 'delete_color'])->name('brand.assets.color.delete');
    Route::post('/brand/assets/image/delete', [BrandAssetController::class, 'delete_image'])->name('brand.assets.image.delete');

    Route::get('/brand/profile', [BrandProfileController::class, 'create'])->name('brand.profile.create');
    Route::get('/brand/profile/edit', [BrandProfileController::class, 'edit'])->name('brand.profile.edit');

    Route::get('/brand/user/profile', [BrandUserProfileController::class, 'create'])->name('brand.user.profile.create');
    Route::get('/brand/user/profile/edit', [BrandUserProfileController::class, 'edit'])->name('brand.user.profile.edit');
    Route::post('/brand/user/profile/update', [BrandUserProfileController::class, 'update'])->name('brand.user.profile.update');
    Route::post('/brand/user/profile/password/update', [BrandUserProfileController::class, 'update_password'])->name('brand.user.profile.password.update');

    Route::get('/brand/payment-method', [BrandPaymentMethodController::class, 'create'])->name('brand.paymentmethod.create');

    Route::get('/brand/order-confirmation', [BrandPaymentMethodController::class, 'create_order_confirmation'])->name('brand.orderconfirmation.create');

    Route::get('/brand/proof-of-payment', [BrandProofOfPaymentController::class, 'create'])->name('brand.proofofpayment.create');

    Route::get('/brand/employees', [BrandEmployeeController::class, 'create'])->name('brand.employees.create');
    Route::post('/brand/employees/update', [BrandEmployeeController::class, 'update_employee'])->name('brand.employees.update');
    Route::delete('/brand/employees/delete/{id}', [BrandEmployeeController::class, 'delete_employee'])->name('brand.employees.delete');
    Route::get('/brand/employees/cancel', [BrandEmployeeController::class, 'cancel_edit_employee'])->name('brand.employees.cancel');
    Route::post('/brand/employees/invitation/store', [BrandEmployeeController::class, 'store_invitation'])->name('brand.employees.invitation.store');
    Route::get('/brand/employees/search', [BrandEmployeeController::class, 'search_employee'])->name('brand.employees.search');

    Route::get('/brand/tickets', [BrandTicketController::class, 'create'])->name('brand.tickets.create');
    Route::get('/brand/tickets/create', [BrandTicketController::class, 'create_ticket'])->name('brand.tickets.create_ticket');
    Route::post('/brand/tickets/store', [BrandTicketController::class, 'store'])->name('brand.tickets.store');
    Route::get('/brand/tickets/view', [BrandTicketController::class, 'view'])->name('brand.tickets.view');
});
