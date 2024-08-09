<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mockup\MockupAdministratorController;

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/administrator/dashboard', [MockupAdministratorController::class, 'create'])->name('administrator.create');
    Route::post('administrator/announcement/post', [MockupAdministratorController::class, 'store_announcement'])->name('administrator.post.announcement');
    Route::get('administrator/announcement/edit/{id}', [MockupAdministratorController::class, 'edit_announcement'])->name('administrator.edit.announcement');
    Route::post('/administrator/announcement/update/{id}', [MockupAdministratorController::class, 'update_announcement'])->name('administrator.update.announcement');
    Route::post('/administrator/announcement/delete/{id}', [MockupAdministratorController::class, 'delete_announcement'])->name('administrator.delete.announcement');
});