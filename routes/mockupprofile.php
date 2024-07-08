<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile', [ProfileController::class, 'create_mockup'])->name('profile.create_mockup');
    Route::post('/profile', [ProfileController::class, 'update_timezone'])->name('profile.update_timezone');
    Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');
});