<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HRController;

Route::get('/hr', [HRController::class, 'index'])->name('hr.index');
Route::get('/hr/create', [HRController::class, 'create'])->name('hr.create');
Route::post('/hr', [HRController::class, 'store'])->name('hr.store');
Route::get('/hr/{id}', [HRController::class, 'show'])->name('hr.show');
Route::get('/hr/{id}/edit', [HRController::class, 'edit'])->name('hr.edit');
Route::put('/hr/{id}', [HRController::class, 'update'])->name('hr.update');
Route::get('/hr/{id}/delete', [HRController::class, 'confirmDelete'])->name('hr.confirmDelete');
Route::delete('/hr/{id}', [HRController::class, 'destroy'])->name('hr.destroy');
