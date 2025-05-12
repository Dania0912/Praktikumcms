<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HRController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\JadwalKerjaController;

Route::get('/', [HomeController::class, 'index']);


// ======================== Karyawan ========================
Route::resource('karyawan', KaryawanController::class);
Route::get('/karyawan/{id}/delete', [KaryawanController::class, 'delete'])->name('karyawan.delete');

// ======================== HR ========================
Route::resource('hr', HRController::class);
Route::put('/hr{id}/update', [HRController::class, 'update'])->name('hr.update');
Route::get('/hr/{id}/edit', [HRController::class, 'edit'])->name('hr.edit');
Route::get('/hr/{id}/delete', [HRController::class, 'delete'])->name('hr.confirmDelete'); // Ganti nama route agar cocok


// ======================== Cuti ========================
// Route::get('/cuti/{id}/delete', [CutiController::class, 'delete'])->name('cuti.delete');
// Route::delete('/cuti/{id}', [CutiController::class, 'destroy'])->name('cuti.destroy');
// Route::get('/cuti/create', [CutiController::class, 'create'])->name('cuti.create');
// Route::get('/cuti', [CutiController::class, 'store'])->name('cuti.store');
Route::resource('cuti', CutiController::class);


// ======================== Penggajian ========================
Route::resource('penggajian', PenggajianController::class);
Route::get('/penggajian', [PenggajianController::class, 'index'])->name('penggajian.index');
Route::get('/penggajian{id}/delete', [PenggajianController::class, 'delete'])->name('penggajian.delete');
Route::get('/penggajian{id}/edit', [PenggajianController::class, 'edit'])->name('penggajian.edit');

// ======================== Jadwal Kerja ========================
Route::resource('jadwalkerja', JadwalKerjaController::class);
Route::get('/jadwalkerja{id}/delete', [JadwalKerjaController::class, 'delete'])->name('jadwalkerja.delete');
Route::get('/jadwalkerja{id}/edit', [JadwalKerjaController::class, 'edit'])->name('jadwalkerja.edit');
