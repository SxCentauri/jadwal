<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\MataKuliahController;
use App\Http\Controllers\Admin\PenugasanMengajarController;
use App\Http\Controllers\Admin\RuanganController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('dosen', DosenController::class)->except(['show']);
    Route::resource('matakuliah', MataKuliahController::class)->except(['show']);
    Route::resource('penugasan', PenugasanMengajarController::class)->except(['show']);
    Route::resource('ruangan', RuanganController::class)->except(['show']);
});

Route::middleware(['auth', 'role:dosen'])->prefix('dosen')->name('dosen.')->group(function () {
});

Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
});

require __DIR__.'/auth.php';

