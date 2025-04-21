<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HRController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\JadwalKerjaController;

// ======================== HR ========================
Route::get('/hr', [HRController::class, 'index'])->name('hr.index');
Route::get('/hr/create', [HRController::class, 'create'])->name('hr.create');
Route::post('/hr', [HRController::class, 'store'])->name('hr.store');
Route::get('/hr/{id}', [HRController::class, 'show'])->name('hr.show');
Route::get('/hr/{id}/edit', [HRController::class, 'edit'])->name('hr.edit');
Route::put('/hr/{id}', [HRController::class, 'update'])->name('hr.update');
Route::get('/hr/{id}/delete', [HRController::class, 'confirmDelete'])->name('hr.confirmDelete');
Route::delete('/hr/{id}', [HRController::class, 'destroy'])->name('hr.destroy');

// ======================== Karyawan ========================
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::get('/karyawan/{id}', [KaryawanController::class, 'show'])->name('karyawan.show');
Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::get('/karyawan/{id}/delete', [KaryawanController::class, 'confirmDelete'])->name('karyawan.confirmDelete');
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

// ======================== Cuti ========================
Route::get('/cuti', [CutiController::class, 'index'])->name('cuti.index');
Route::get('/cuti/create', [CutiController::class, 'create'])->name('cuti.create');
Route::post('/cuti', [CutiController::class, 'store'])->name('cuti.store');
Route::get('/cuti/{id}', [CutiController::class, 'show'])->name('cuti.show');
Route::get('/cuti/{id}/edit', [CutiController::class, 'edit'])->name('cuti.edit');
Route::put('/cuti/{id}', [CutiController::class, 'update'])->name('cuti.update');
Route::get('/cuti/{id}/delete', [CutiController::class, 'confirmDelete'])->name('cuti.confirmDelete');
Route::delete('/cuti/{id}', [CutiController::class, 'destroy'])->name('cuti.destroy');

// ======================== Penggajian ========================
Route::get('/penggajian', [PenggajianController::class, 'index'])->name('penggajian.index');
Route::get('/penggajian/create', [PenggajianController::class, 'create'])->name('penggajian.create');
Route::post('/penggajian', [PenggajianController::class, 'store'])->name('penggajian.store');
Route::get('/penggajian/{id}', [PenggajianController::class, 'show'])->name('penggajian.show');
Route::get('/penggajian/{id}/edit', [PenggajianController::class, 'edit'])->name('penggajian.edit');
Route::put('/penggajian/{id}', [PenggajianController::class, 'update'])->name('penggajian.update');
Route::get('/penggajian/{id}/delete', [PenggajianController::class, 'confirmDelete'])->name('penggajian.confirmDelete');
Route::delete('/penggajian/{id}', [PenggajianController::class, 'destroy'])->name('penggajian.destroy');

// ======================== Jadwal Kerja ========================
Route::get('/jadwalkerja', [JadwalKerjaController::class, 'index'])->name('jadwalkerja.index'); 
Route::get('/jadwalkerja/create', [JadwalKerjaController::class, 'create'])->name('jadwalkerja.create');
Route::post('/jadwalkerja', [JadwalKerjaController::class, 'store'])->name('jadwalkerja.store');
Route::get('/jadwalkerja/{id}', [JadwalKerjaController::class, 'show'])->name('jadwalkerja.show');
Route::get('/jadwalkerja/{id}/edit', [JadwalKerjaController::class, 'edit'])->name('jadwalkerja.edit');
Route::put('/jadwalkerja/{id}', [JadwalKerjaController::class, 'update'])->name('jadwalkerja.update');
Route::get('/jadwalkerja/{id}/delete', [JadwalKerjaController::class, 'confirmDelete'])->name('jadwalkerja.confirmDelete');
Route::delete('/jadwalkerja/{id}', [JadwalKerjaController::class, 'destroy'])->name('jadwalkerja.destroy');

// ======================== Home ========================
Route::get('/', function () {
    return view('home');  // Menampilkan halaman home
});
