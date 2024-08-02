<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\MataPelajaran;
use App\Models\SertifikatPerkembangan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\SertifikatTryout;
use App\Models\SettingSertifikat;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class OrangTuaController extends Controller
{
    public function index()
    {
        $siswa = Auth::guard('parent')->user();

        // Ambil nilai status_kedinasan dari kelas siswa
        $statusKedinasan = $siswa->kelas->status_kedinasan;
        
        // Menyaring mata pelajaran berdasarkan status_kedinasan
        if ($statusKedinasan === 1) {
            $mataPelajarans = MataPelajaran::where('opsi_kedinasan', true)->get();
        } elseif ($statusKedinasan === 0) {
            $mataPelajarans = MataPelajaran::where('opsi_kedinasan', false)->get();
        } else {
            // Jika status_kedinasan adalah 2, ambil semua mata pelajaran
            $mataPelajarans = MataPelajaran::all();
        }
        
        $nilai = Nilai::where('siswa_id', $siswa->id)
                    ->with(['tryout.tahunPelajaran', 'mataPelajaran'])
                    ->get()
                    ->sortBy(function($nilai) {
                        return $nilai->tryout->nama_tryout;
                    })
                    ->groupBy('tryout_id');
        // $mataPelajarans = MataPelajaran::all(); // Pastikan ini dikirim ke view

        $statusKedinasan = $siswa->kelas->status_kedinasan;

        return view('dashboard_orang_tua', compact('siswa', 'nilai', 'mataPelajarans', 'statusKedinasan'));
    }

    public function downloadSertifikat(Request $request, $id)
    {
        $siswa = Siswa::with(['kelas', 'nilais.mataPelajaran', 'nilais.tryout.tahunPelajaran'])->findOrFail($id);
        
        
        // $mataPelajarans = MataPelajaran::all();

        // Mengambil status_kedinasan dari kelas siswa
        $statusKedinasan = $siswa->kelas->status_kedinasan;

        // Menyaring mata pelajaran berdasarkan status_kedinasan
        if ($statusKedinasan === 1) {
            $mataPelajarans = MataPelajaran::where('opsi_kedinasan', true)->get();
        } elseif ($statusKedinasan === 0) {
            $mataPelajarans = MataPelajaran::where('opsi_kedinasan', false)->get();
        } else {
            // Jika status_kedinasan adalah 2, ambil semua mata pelajaran
            $mataPelajarans = MataPelajaran::all();
        }

        // $nilai = $siswa->nilais->groupBy('tryout_id');

        // Mengurutkan nilai berdasarkan nama tryout
        $nilai = $siswa->nilais->sortBy(function($nilai) {
            return $nilai->tryout->nama_tryout;
        })->groupBy('tryout_id');
    
        // Pisahkan mata pelajaran berdasarkan opsi_test_tps
        $mataPelajaransFalse = $mataPelajarans->where('opsi_test_tps', false);
        $mataPelajaransTrue = $mataPelajarans->where('opsi_test_tps', true);

        // Check if sertifikat exists
        $sertifikatperkembangan = SertifikatPerkembangan::firstOrCreate(
            ['siswa_id' => $id],
            ['no_sertifikat' => strtoupper(Str::random(10)), 'status' => true]
        );
    
        $pdf = Pdf::loadView('sertifikat_orang_tua', compact('siswa', 'nilai', 'mataPelajaransFalse', 'mataPelajaransTrue', 'sertifikatperkembangan', 'statusKedinasan', 'mataPelajarans'))
                ->setPaper('a4', 'landscape');
    
        // return $pdf->download('sertifikat.pdf');

        $fileName = 'Sertifikat_perkembangan_' . str_replace(' ', '_', $siswa->nama_siswa) . '_' . date('Ymd_His') . '.pdf';

        return $pdf->download($fileName);

    }

    public function downloadSertifikatTryout(Request $request, $id, $tryout_id)
    {
        $siswa = Siswa::with(['kelas', 'nilais' => function($query) use ($tryout_id) {
            $query->where('tryout_id', $tryout_id)->with('mataPelajaran', 'tryout.tahunPelajaran');
        }])->findOrFail($id);

        // $mataPelajarans = MataPelajaran::all();

        // Mengambil status_kedinasan dari kelas siswa
        $statusKedinasan = $siswa->kelas->status_kedinasan;

        // Menyaring mata pelajaran berdasarkan status_kedinasan
        if ($statusKedinasan === 1) {
            $mataPelajarans = MataPelajaran::where('opsi_kedinasan', true)->get();
        } elseif ($statusKedinasan === 0) {
            $mataPelajarans = MataPelajaran::where('opsi_kedinasan', false)->get();
        } else {
            // Jika status_kedinasan adalah 2, ambil semua mata pelajaran
            $mataPelajarans = MataPelajaran::all();
        }

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

        // Fetch the active setting sertifikat
        $settingSertifikat = SettingSertifikat::where('status', true)->first();

        $pdf = Pdf::loadView('sertifikat_orang_tua_tryout', compact('siswa', 'nilai', 'mataPelajaransFalse', 'mataPelajaransTrue', 'sertifikat', 'settingSertifikat'))
                ->setPaper('a4', 'landscape');

        $filename = 'Sertifikat_' . $siswa->nama_siswa . '_Tryout_' . $nilai->first()->first()->tryout->nama_tryout . '_' . date('Ymd_His') . '.pdf';

        return $pdf->download($filename);
    }
    
    public function showLoginForm()
    {
        if (Auth::guard('parent')->check()) {
            return redirect()->route('orang_tua.index');
        }
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
