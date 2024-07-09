<?php

// brand.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Brand\BrandTaskController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/brand/tasks', [BrandTaskController::class, 'create'])->name('brand.tasks.create');
    Route::post('/brand/tasks/store', [BrandTaskController::class, 'store'])->name('brand.tasks.store');
    Route::put('/brand/tasks/update/{task}', [BrandTaskController::class, 'update'])->name('brand.tasks.update');
    Route::delete('/brand/tasks/delete/{task}', [BrandTaskController::class, 'delete'])->name('brand.tasks.delete');
});
