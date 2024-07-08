<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mockup\MockupAdministratorController;

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/mockup/administrator/dashboard', [MockupAdministratorController::class, 'create'])->name('mockup.administrator.create');
    Route::post('/mockup/administrator/announcement/post', [MockupAdministratorController::class, 'post_announcement'])->name('mockup.administrator.post.announcement');
    Route::get('/mockup/administrator/announcement/edit/{id}', [MockupAdministratorController::class, 'edit_announcement'])->name('mockup.administrator.edit.announcement');
    Route::post('/mockup/administrator/announcement/update/{id}', [MockupAdministratorController::class, 'update_announcement'])->name('mockup.administrator.update.announcement');
    Route::post('/mockup/administrator/announcement/delete/{id}', [MockupAdministratorController::class, 'delete_announcement'])->name('mockup.administrator.delete.announcement');
});