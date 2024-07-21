<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AbsensiDetail;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AbsensiExport;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $query = AbsensiDetail::with('siswa', 'absensi.guru', 'absensi.kelas', 'absensi.guru.mataPelajaran');

        if ($request->has('date')) {
            $query->whereHas('absensi', function($q) use ($request) {
                $q->whereDate('tanggal', $request->date);
            });
        }

        if ($request->has('mata_pelajaran_id')) {
            $query->whereHas('absensi.guru.mataPelajaran', function ($q) use ($request) {
                $q->where('id', $request->mata_pelajaran_id);
            });
        }

        $absensiDetails = $query->paginate(10);

        $mataPelajarans = MataPelajaran::all();

        return view('admin.absensi.data_absensi', compact('absensiDetails', 'mataPelajarans'));
    }

    public function export(Request $request)
    {
        return Excel::download(new AbsensiExport($request->date, $request->mata_pelajaran_id), 'absensi.xlsx');
    }
}
