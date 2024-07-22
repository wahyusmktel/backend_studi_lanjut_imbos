<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\MataPelajaran;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\SertifikatTryout;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

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

    public function downloadSertifikatTryout(Request $request, $id, $tryout_id)
    {
        $siswa = Siswa::with(['kelas', 'nilais' => function($query) use ($tryout_id) {
            $query->where('tryout_id', $tryout_id)->with('mataPelajaran', 'tryout.tahunPelajaran');
        }])->findOrFail($id);

        $mataPelajarans = MataPelajaran::all();

        // Mengurutkan nilai berdasarkan nama tryout
        $nilai = $siswa->nilais->sortBy(function($nilai) {
            return $nilai->tryout->nama_tryout;
        })->groupBy('tryout_id');

        // Pisahkan mata pelajaran berdasarkan opsi_test_tps
        $mataPelajaransFalse = $mataPelajarans->where('opsi_test_tps', false);
        $mataPelajaransTrue = $mataPelajarans->where('opsi_test_tps', true);

        // Check if sertifikat exists
        $sertifikat = SertifikatTryout::firstOrCreate(
            ['siswa_id' => $id, 'tryout_id' => $tryout_id],
            ['no_sertifikat' => strtoupper(Str::random(10)), 'status' => true]
        );

        // Generate barcode for the sertifikat as base64
        // $barcode = generateQrCodeBase64($sertifikat->no_sertifikat);

        $pdf = Pdf::loadView('sertifikat_orang_tua_tryout', compact('siswa', 'nilai', 'mataPelajaransFalse', 'mataPelajaransTrue', 'sertifikat'))
                ->setPaper('a4', 'portrait');

        $filename = 'Sertifikat_' . $siswa->nama_siswa . '_Tryout_' . $nilai->first()->first()->tryout->nama_tryout . '_' . date('Ymd_His') . '.pdf';

        return $pdf->download($filename);
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
