<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HRController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\JadwalKerjaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/', [HomeController::class, 'index'])->middleware('auth:hr')->name('home');




// ======================== Karyawan ========================
Route::resource('karyawan', KaryawanController::class);
Route::get('/karyawan/{id}/delete', [KaryawanController::class, 'delete'])->name('karyawan.delete');

// ======================== HR ========================
Route::resource('hr', HRController::class);
Route::put('/hr{id}/update', [HRController::class, 'update'])->name('hr.update');
Route::get('/hr/{id}/edit', [HRController::class, 'edit'])->name('hr.edit');
Route::get('/hr/{id}/delete', [HRController::class, 'delete'])->name('hr.confirmDelete'); // Ganti nama route agar cocok


// ======================== Cuti ========================
Route::resource('cuti', CutiController::class);
Route::get('/cuti/{id}/delete', [CutiController::class, 'delete'])->name('cuti.delete');
Route::get('/cuti/{id}/edit', [CutiController::class, 'edit'])->name('cuti.edit');
Route::get('cuti/create', [CutiController::class, 'create'])->name('cuti.create');


// ======================== Penggajian ========================
Route::resource('penggajian', PenggajianController::class);
Route::get('/penggajian', [PenggajianController::class, 'index'])->name('penggajian.index');
Route::get('/penggajian/{id}/delete', [PenggajianController::class, 'delete'])->name('penggajian.delete');
Route::get('/penggajian{id}/edit', [PenggajianController::class, 'edit'])->name('penggajian.edit');

// ======================== Jadwal Kerja ========================

Route::post('/jadwalkerja', [JadwalKerjaController::class, 'store'])->name('jadwalkerja.store');
Route::resource('jadwalkerja', JadwalKerjaController::class);
Route::get('/jadwalkerja/{id}/delete', [JadwalKerjaController::class, 'delete'])->name('jadwalkerja.delete');
Route::get('/jadwalkerja/{id}/edit', [JadwalKerjaController::class, 'edit'])->name('jadwalkerja.edit');
Route::get('jadwalkerja/create', [JadwalKerjaController::class, 'create'])->name('jadwalkerja.create');
Route::put('/jadwalkerja{id}/update', [JadwalKerjaController::class, 'update'])->name('jadwalkerja.update');

Route::get('/pendaftaran-ktp', function () {
    return "Selamat datang di halaman Pendaftaran KTP Online";
})->middleware('check.age');


Route::get('/upload', [ImageController::class, 'create']);
Route::post('/upload', [ImageController::class, 'store'])->name('image.upload');
Route::delete('/upload/{id}', [ImageController::class, 'destroy'])->name('image.delete');



