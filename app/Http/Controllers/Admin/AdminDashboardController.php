<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\MataPelajaran;
use App\Models\Nilai;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $jumlahSiswa = Siswa::count();
        $jumlahGuru = Guru::count();
        $jumlahMataPelajaran = MataPelajaran::count();
        $jumlahNilai = Nilai::count();

        return view('admin.dashboard', compact('jumlahSiswa', 'jumlahGuru', 'jumlahMataPelajaran', 'jumlahNilai'));
    }
}
