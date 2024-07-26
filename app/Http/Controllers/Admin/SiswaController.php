<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\SiswaImport;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\ProgramBimbel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama_siswa', 'like', '%' . $search . '%')
                  ->orWhere('nis', 'like', '%' . $search . '%');
        }

        $siswas = $query->paginate(10);
        $kelas = Kelas::all();
        $programBimbels = ProgramBimbel::all();

        return view('admin.siswa.index', compact('siswas', 'kelas', 'programBimbels'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kelas_id' => 'required|uuid',
            'program_bimbel_id' => 'required|uuid',
            'nama_siswa' => 'required|string|max:255',
            'tgl_lahir' => 'nullable|date',
            'tmpt_lahir' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:15',
            'nis' => 'required|integer',
            'password' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto_siswa'] = $request->file('foto')->store('foto_siswa', 'public');
        }

        $data['id'] = Str::uuid();
        $data['password'] = Hash::make($data['password']);
        $data['status'] = true;

        Siswa::create($data);

        return redirect()->route('admin.siswa.index')->with('success', 'Data Siswa berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $data = $request->validate([
            'kelas_id' => 'required|uuid',
            'program_bimbel_id' => 'required|uuid',
            'nama_siswa' => 'required|string|max:255',
            'tgl_lahir' => 'nullable|date',
            'tmpt_lahir' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:15',
            'nis' => 'required|integer',
            'password' => 'nullable|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($siswa->foto_siswa && \Storage::disk('public')->exists($siswa->foto_siswa)) {
                \Storage::disk('public')->delete($siswa->foto_siswa);
            }
            $data['foto_siswa'] = $request->file('foto')->store('foto_siswa', 'public');
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $siswa->update($data);

        return redirect()->route('admin.siswa.index')->with('success', 'Data Siswa berhasil diupdate.');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        // return redirect()->route('admin.siswa.index')->with('success', 'Data Siswa berhasil dihapus.');
        return response()->json(['success' => 'Data Siswa berhasil dihapus.']);
    }

    public function import(Request $request)
    {
        
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        Excel::import(new SiswaImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data siswa berhasil diimport.');
    }
}
