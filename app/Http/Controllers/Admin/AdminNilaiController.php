<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Tryout;
use App\Models\MataPelajaran;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\TahunPelajaran;
use Illuminate\Http\Request;

class AdminNilaiController extends Controller
{
    // public function index(Request $request)
    // {
    //     $tahunPelajaranId = $request->input('tahun_pelajaran_id');
    //     $tryoutId = $request->input('tryout_id');
    //     $search = $request->input('search');

    //     $query = Nilai::query();

    //     if ($search) {
    //         $query->whereHas('siswa', function($q) use ($search) {
    //             $q->where('nama_siswa', 'like', '%' . $search . '%');
    //         });
    //     }

    //     if ($tryoutId) {
    //         $query->where('tryout_id', $tryoutId);
    //     }

    //     $nilais = $query->paginate(10)->appends($request->all());

    //     $tahunPelajarans = TahunPelajaran::where('status', true)->get();
    //     $tryouts = $tahunPelajaranId ? Tryout::where('tahun_pelajaran_id', $tahunPelajaranId)->get() : collect();
    //     $mataPelajarans = MataPelajaran::all();
    //     $siswas = Siswa::all();
    //     $kelas = Kelas::all();

    //     return view('admin.nilai.data_nilai', compact('nilais', 'tahunPelajarans', 'mataPelajarans', 'siswas', 'tryouts', 'tahunPelajaranId', 'tryoutId', 'kelas', 'search'));
    // }

    // public function index(Request $request)
    // {
    //     $tahunPelajaranId = $request->input('tahun_pelajaran_id');
    //     $tryoutId = $request->input('tryout_id');
    //     $kelasId = $request->input('kelas_id');
    //     $search = $request->input('search');

    //     $query = Nilai::query();

    //     if ($search) {
    //         $query->whereHas('siswa', function($q) use ($search) {
    //             $q->where('nama_siswa', 'like', '%' . $search . '%');
    //         });
    //     }

    //     if ($tryoutId) {
    //         $query->where('tryout_id', $tryoutId);
    //     }

    //     $nilais = $query->paginate(10)->appends($request->all());

    //     $tahunPelajarans = TahunPelajaran::where('status', true)->get();
    //     $tryouts = $tahunPelajaranId ? Tryout::where('tahun_pelajaran_id', $tahunPelajaranId)->get() : collect();
    //     $mataPelajarans = MataPelajaran::all();
    //     $siswas = $kelasId ? Siswa::where('kelas_id', $kelasId)->get() : collect();
    //     $kelas = Kelas::all();

    //     return view('admin.nilai.data_nilai', compact('nilais', 'tahunPelajarans', 'mataPelajarans', 'siswas', 'tryouts', 'tahunPelajaranId', 'tryoutId', 'kelas', 'search', 'kelasId'));
    // }

    public function index(Request $request)
    {
        $tahunPelajaranId = $request->input('tahun_pelajaran_id');
        $tryoutId = $request->input('tryout_id');
        $kelasId = $request->input('kelas_id');
        $search = $request->input('search');

        $query = Nilai::query();

        if ($search) {
            $query->whereHas('siswa', function($q) use ($search) {
                $q->where('nama_siswa', 'like', '%' . $search . '%');
            });
        }

        if ($tryoutId) {
            $query->where('tryout_id', $tryoutId);
        }

        $nilais = $query->paginate(10)->appends($request->all());

        $tahunPelajarans = TahunPelajaran::where('status', true)->get();
        $tryouts = $tahunPelajaranId ? Tryout::where('tahun_pelajaran_id', $tahunPelajaranId)->get() : collect();
        $mataPelajarans = MataPelajaran::all();
        $siswas = $kelasId ? Siswa::where('kelas_id', $kelasId)->get() : collect();
        $kelas = Kelas::all();

        $existingNilai = Nilai::where('tryout_id', $tryoutId)
                            ->whereIn('siswa_id', $siswas->pluck('id'))
                            ->get()
                            ->groupBy('siswa_id')
                            ->map(function ($items) {
                                return $items->keyBy('mata_pelajaran_id');
                            });

        return view('admin.nilai.data_nilai', compact('nilais', 'tahunPelajarans', 'mataPelajarans', 'siswas', 'tryouts', 'tahunPelajaranId', 'tryoutId', 'kelas', 'search', 'kelasId', 'existingNilai'));
    }

    public function getTryouts(Request $request)
    {
        $tryouts = Tryout::where('tahun_pelajaran_id', $request->tahun_pelajaran_id)->pluck('nama_tryout', 'id');
        return response()->json($tryouts);
    }

    public function getSiswas(Request $request)
    {
        $siswas = Siswa::where('kelas_id', $request->kelas_id)->get();
        return response()->json($siswas);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nilai.*.*' => 'required|integer|min:10|max:100',
            'tryout_id' => 'required|uuid',
        ]);

        foreach ($data['nilai'] as $siswaId => $nilaiPerPelajaran) {
            foreach ($nilaiPerPelajaran as $mataPelajaranId => $nilai) {
                Nilai::updateOrCreate(
                    [
                        'siswa_id' => $siswaId,
                        'mata_pelajaran_id' => $mataPelajaranId,
                        'tryout_id' => $data['tryout_id'],
                    ],
                    [
                        'nilai' => $nilai,
                        'status' => true,
                    ]
                );
            }
        }

        return redirect()->back()->with('success', 'Nilai berhasil disimpan.');
    }



    public function update(Request $request, $id)
    {
        $nilai = Nilai::findOrFail($id);

        $data = $request->validate([
            'tryout_id' => 'required|uuid',
            'mata_pelajaran_id' => 'required|uuid',
            'siswa_id' => 'required|uuid',
            'nilai' => 'required|integer|between:10,100',
        ]);

        $nilai->update($data);

        return redirect()->route('admin.nilai.index')->with('success', 'Data Nilai berhasil diupdate.');
    }

    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->route('admin.nilai.index')->with('success', 'Data Nilai berhasil dihapus.');
    }
}
