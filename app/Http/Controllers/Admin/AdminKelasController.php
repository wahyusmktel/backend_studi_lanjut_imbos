<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class AdminKelasController extends Controller
{
    public function index(Request $request)
    {
        $query = Kelas::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama_kelas', 'like', '%' . $search . '%')
                ->orWhere('tingkat_kelas', 'like', '%' . $search . '%');
        }

        $kelas = $query->paginate(10);

        return view('admin.kelas.data_kelas', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'tingkat_kelas' => 'required|string|max:255',
            'status_kedinasan' => 'required',
        ]);

        Kelas::create($request->all());

        return redirect()->route('admin.kelas.index')->with('success', 'Data Kelas berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'tingkat_kelas' => 'required|string|max:255',
            'status_kedinasan' => 'required',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());

        return redirect()->route('admin.kelas.index')->with('success', 'Data Kelas berhasil diupdate.');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        // return redirect()->route('admin.kelas.index')->with('success', 'Data Kelas berhasil dihapus.');
        return response()->json(['success' => 'Data Kelas berhasil dihapus.']);
    }
}
