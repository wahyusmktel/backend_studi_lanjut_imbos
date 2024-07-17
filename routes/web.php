<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminGuruController;
use App\Http\Controllers\Admin\MataPelajaranController;
use App\Http\Controllers\Admin\AdminKelasController;
use App\Http\Controllers\Admin\AdminNilaiController;
use App\Http\Controllers\Admin\AdminTahunPelajaranController;
use App\Http\Controllers\Admin\AdminTryoutController;
use App\Http\Controllers\Admin\ProgramBimbelController;
use App\Http\Controllers\Admin\SiswaController;

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
        // Route::get('/guru/data_guru', [AdminGuruController::class, 'index'])->name('admin.guru.data_guru');

        //Mata Pelajaran
        Route::get('/mata_pelajaran', [MataPelajaranController::class, 'index'])->name('admin.mata_pelajaran.index');
        Route::post('/mata_pelajaran', [MataPelajaranController::class, 'store'])->name('admin.mata_pelajaran.store');
        Route::post('/mata_pelajaran/{id}', [MataPelajaranController::class, 'update'])->name('admin.mata_pelajaran.update');
        Route::delete('/mata_pelajaran/{id}', [MataPelajaranController::class, 'destroy'])->name('admin.mata_pelajaran.destroy');
        // Route::get('/mata_pelajaran', [MataPelajaranController::class, 'index'])->name('admin.mata_pelajaran.index');

        // Guru
        Route::get('/guru', [AdminGuruController::class, 'index'])->name('admin.guru.data_guru');
        Route::post('/guru', [AdminGuruController::class, 'store'])->name('admin.guru.store');
        Route::post('/guru/{id}', [AdminGuruController::class, 'update'])->name('admin.guru.update');
        Route::delete('/guru/{id}', [AdminGuruController::class, 'destroy'])->name('admin.guru.destroy');

        // Kelas
        Route::get('/kelas', [AdminKelasController::class, 'index'])->name('admin.kelas.index');
        Route::post('/kelas', [AdminKelasController::class, 'store'])->name('admin.kelas.store');
        Route::post('/kelas/{id}', [AdminKelasController::class, 'update'])->name('admin.kelas.update');
        Route::delete('/kelas/{id}', [AdminKelasController::class, 'destroy'])->name('admin.kelas.destroy');

        // Program Bimbel
        Route::get('/program_bimbel', [ProgramBimbelController::class, 'index'])->name('admin.program_bimbel.index');
        Route::post('/program_bimbel', [ProgramBimbelController::class, 'store'])->name('admin.program_bimbel.store');
        Route::post('/program_bimbel/{id}', [ProgramBimbelController::class, 'update'])->name('admin.program_bimbel.update');
        Route::delete('/program_bimbel/{id}', [ProgramBimbelController::class, 'destroy'])->name('admin.program_bimbel.destroy');

        // Siswa
        Route::get('/siswa', [SiswaController::class, 'index'])->name('admin.siswa.index');
        Route::post('/siswa', [SiswaController::class, 'store'])->name('admin.siswa.store');
        Route::post('/siswa/{id}', [SiswaController::class, 'update'])->name('admin.siswa.update');
        Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('admin.siswa.destroy');

        // Tahun Pelajaran
        Route::get('/tahun_pelajaran', [AdminTahunPelajaranController::class, 'index'])->name('admin.tahun_pelajaran.index');
        Route::post('/tahun_pelajaran', [AdminTahunPelajaranController::class, 'store'])->name('admin.tahun_pelajaran.store');
        Route::post('/tahun_pelajaran/{id}', [AdminTahunPelajaranController::class, 'update'])->name('admin.tahun_pelajaran.update');
        Route::delete('/tahun_pelajaran/{id}', [AdminTahunPelajaranController::class, 'destroy'])->name('admin.tahun_pelajaran.destroy');

        // Try Out
        Route::get('/tryout', [AdminTryoutController::class, 'index'])->name('admin.tryout.index');
        Route::post('/tryout', [AdminTryoutController::class, 'store'])->name('admin.tryout.store');
        Route::post('/tryout/{id}', [AdminTryoutController::class, 'update'])->name('admin.tryout.update');
        Route::delete('/tryout/{id}', [AdminTryoutController::class, 'destroy'])->name('admin.tryout.destroy');

        // Nilai
        Route::get('/nilai', [AdminNilaiController::class, 'index'])->name('admin.nilai.index');
        Route::get('/nilai/getTryouts', [AdminNilaiController::class, 'getTryouts'])->name('admin.nilai.getTryouts');
        Route::get('/nilai/getSiswas', [AdminNilaiController::class, 'getSiswas'])->name('admin.nilai.getSiswas');
        Route::post('/nilai', [AdminNilaiController::class, 'store'])->name('admin.nilai.store');
        Route::post('/nilai/{id}', [AdminNilaiController::class, 'update'])->name('admin.nilai.update');
        Route::delete('/nilai/{id}', [AdminNilaiController::class, 'destroy'])->name('admin.nilai.destroy');
        Route::get('/nilai-siswa', [AdminNilaiController::class, 'nilaiSiswaIndex'])->name('admin.nilai-siswa.index');
        Route::get('/nilai-siswa/{id}', [AdminNilaiController::class, 'detail'])->name('admin.nilai.detail');

    });
});