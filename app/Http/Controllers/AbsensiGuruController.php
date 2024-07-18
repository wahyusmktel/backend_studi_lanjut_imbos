<?php

namespace App\Http\Controllers;

// use App\Models\AbsensiGuru;
use Illuminate\Http\Request;

class AbsensiGuruController extends Controller
{
    public function index()
    {
        return view('absensi');
    }
    public function absensi()
    {
        return view('absensi_guru');
    }
}
