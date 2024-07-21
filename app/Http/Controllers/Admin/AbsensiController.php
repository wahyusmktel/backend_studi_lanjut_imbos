<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AbsensiDetail;
use App\Models\MataPelajaran;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AbsensiExport;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $query = AbsensiDetail::with('siswa', 'absensi.guru', 'absensi.kelas', 'absensi.guru.mataPelajaran');

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereHas('absensi', function($q) use ($request) {
                $q->whereBetween('tanggal', [$request->start_date, $request->end_date]);
            });
        }

        if ($request->filled('mata_pelajaran_id')) {
            $query->whereHas('absensi.guru.mataPelajaran', function ($q) use ($request) {
                $q->where('id', $request->mata_pelajaran_id);
            });
        }

        if ($request->filled('kelas_id')) {
            $query->whereHas('absensi.kelas', function ($q) use ($request) {
                $q->where('id', $request->kelas_id);
            });
        }

        $absensiDetails = $query->paginate(10);
        $mataPelajarans = MataPelajaran::all();
        $kelases = Kelas::all();

        return view('admin.absensi.data_absensi', compact('absensiDetails', 'mataPelajarans', 'kelases'));
    }

    public function export(Request $request)
    {
        return Excel::download(new AbsensiExport($request->start_date, $request->end_date, $request->mata_pelajaran_id, $request->kelas_id), 'absensi.xlsx');
    }
}
