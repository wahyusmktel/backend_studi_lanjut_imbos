<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Siswa;

use App\Models\Nilai;
use App\Models\MataPelajaran;
use Barryvdh\DomPDF\Facade\Pdf;

class OrangTuaController extends Controller
{
    public function index()
    {
        $siswa = Auth::guard('parent')->user();
        $nilai = Nilai::where('siswa_id', $siswa->id)
                    ->with(['tryout.tahunPelajaran', 'mataPelajaran'])
                    ->get()
                    ->sortBy(function($nilai) {
                        return $nilai->tryout->nama_tryout;
                    })
                    ->groupBy('tryout_id');
        $mataPelajarans = MataPelajaran::all(); // Pastikan ini dikirim ke view

        return view('dashboard_orang_tua', compact('siswa', 'nilai', 'mataPelajarans'));
    }

    public function downloadSertifikat(Request $request, $id)
    {
        $siswa = Siswa::with(['kelas', 'nilais.mataPelajaran', 'nilais.tryout.tahunPelajaran'])->findOrFail($id);
        $mataPelajarans = MataPelajaran::all();

        // $nilai = $siswa->nilais->groupBy('tryout_id');

        // Mengurutkan nilai berdasarkan nama tryout
        $nilai = $siswa->nilais->sortBy(function($nilai) {
            return $nilai->tryout->nama_tryout;
        })->groupBy('tryout_id');
    
        // Pisahkan mata pelajaran berdasarkan opsi_test_tps
        $mataPelajaransFalse = $mataPelajarans->where('opsi_test_tps', false);
        $mataPelajaransTrue = $mataPelajarans->where('opsi_test_tps', true);
    
        $pdf = Pdf::loadView('sertifikat_orang_tua', compact('siswa', 'nilai', 'mataPelajaransFalse', 'mataPelajaransTrue'))
                ->setPaper('a4', 'landscape');
    
        // return $pdf->download('sertifikat.pdf');

        $fileName = 'Sertifikat_' . str_replace(' ', '_', $siswa->nama_siswa) . '_' . date('Ymd_His') . '.pdf';

        return $pdf->download($fileName);

    }
    
    public function showLoginForm()
    {
        return view('orang_tua');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nis', 'password');

        if (Auth::guard('parent')->attempt($credentials)) {
            return redirect()->intended(route('orang_tua.index'));
        }

        // return redirect()->back()->withErrors(['nis' => 'NIS atau password salah.']);
        return redirect()->back()->with('error', 'NIS atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::guard('parent')->logout();
        return redirect()->route('parent.login');
    }
}
