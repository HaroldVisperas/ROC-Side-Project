<?php

// brand.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Brand\BrandDashboardController;
use App\Http\Controllers\Brand\BrandTaskController;
use App\Http\Controllers\Brand\BrandAssetController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/brand/dashboard', [BrandDashboardController::class, 'create'])->name('brand.dashboard.create');

    Route::get('/brand/tasks', [BrandTaskController::class, 'create'])->name('brand.tasks.create');
    Route::post('/brand/tasks/store', [BrandTaskController::class, 'store'])->name('brand.tasks.store');
    Route::put('/brand/tasks/update/{task}', [BrandTaskController::class, 'update'])->name('brand.tasks.update');
    Route::delete('/brand/tasks/delete/{task}', [BrandTaskController::class, 'delete'])->name('brand.tasks.delete');

    Route::get('/brand/assets', [BrandAssetController::class, 'create'])->name('brand.assets.create');
    Route::post('/brand/assets/image/store', [BrandAssetController::class, 'store'])->name('brand.assets.image.store');
});
