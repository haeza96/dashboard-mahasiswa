<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');

Route::get('/laporan', function () {
    return view('laporan', [
        'adminName' => 'Administrator Sistem',
    ]);
})->name('laporan.index');
