<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminGuruController;
use App\Http\Controllers\Admin\MataPelajaranController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::middleware(['admin'])->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/guru/data_guru', [AdminGuruController::class, 'index'])->name('admin.guru.data_guru');

        //Mata Pelajaran
        Route::get('/mata_pelajaran', [MataPelajaranController::class, 'index'])->name('admin.mata_pelajaran.index');
        Route::post('/mata_pelajaran', [MataPelajaranController::class, 'store'])->name('admin.mata_pelajaran.store');
        Route::post('/mata_pelajaran/{id}', [MataPelajaranController::class, 'update'])->name('admin.mata_pelajaran.update');
        Route::delete('/mata_pelajaran/{id}', [MataPelajaranController::class, 'destroy'])->name('admin.mata_pelajaran.destroy');
        // Route::get('/mata_pelajaran', [MataPelajaranController::class, 'index'])->name('admin.mata_pelajaran.index');
    });
});