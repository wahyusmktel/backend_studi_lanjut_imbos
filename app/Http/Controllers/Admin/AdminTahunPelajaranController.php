<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TahunPelajaran;
use Illuminate\Support\Str;

class AdminTahunPelajaranController extends Controller
{
    public function index(Request $request)
    {
        $query = TahunPelajaran::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama_tahun_pelajaran', 'like', '%' . $search . '%')
                  ->orWhere('semester', 'like', '%' . $search . '%');
        }

        $tahunPelajarans = $query->paginate(10);

        return view('admin.tahun_pelajaran.data_tahun_pelajaran', compact('tahunPelajarans'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_tahun_pelajaran' => 'required|string|max:255',
            'semester' => 'required|in:1,2',
        ]);

        $data['status'] = false;
        $data['id'] = Str::uuid();
        TahunPelajaran::create($data);

        return redirect()->route('admin.tahun_pelajaran.index')->with('success', 'Data Tahun Pelajaran berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $tahunPelajaran = TahunPelajaran::findOrFail($id);

        $data = $request->validate([
            'nama_tahun_pelajaran' => 'required|string|max:255',
            'semester' => 'required|in:1,2',
        ]);

        $tahunPelajaran->update($data);

        return redirect()->route('admin.tahun_pelajaran.index')->with('success', 'Data Tahun Pelajaran berhasil diupdate.');
    }

    public function destroy($id)
    {
        $tahunPelajaran = TahunPelajaran::findOrFail($id);
        $tahunPelajaran->delete();

        return redirect()->route('admin.tahun_pelajaran.index')->with('success', 'Data Tahun Pelajaran berhasil dihapus.');
    }
}
