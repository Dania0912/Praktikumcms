<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HRController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\JadwalKerjaController;




// ======================== Karyawan ========================
Route::resource('karyawan', KaryawanController::class);
Route::get('/karyawan/{id}/delete', [KaryawanController::class, 'delete'])->name('karyawan.delete');



// ======================== Cuti ========================
Route::get('/cuti/{id}/delete', [CutiController::class, 'delete'])->name('cuti.delete');
Route::delete('/cuti/{id}', [CutiController::class, 'destroy'])->name('cuti.destroy');
Route::get('/cuti/create', [CutiController::class, 'create'])->name('cuti.create');
Route::post('/cuti', [CutiController::class, 'store'])->name('cuti.store');


// ======================== Penggajian ========================
Route::resource('penggajian', PenggajianController::class);
Route::resource('penggajian', PenggajianController::class);
Route::get('/penggajian', [PenggajianController::class, 'index'])->name('penggajian.index');


// ======================== Jadwal Kerja ========================
Route::resource('jadwalkerja', JadwalKerjaController::class);
Route::get('/jadwalkerja{id}/delete', [JadwalKerjaController::class, 'delete'])->name('jadwalkerja.delete');