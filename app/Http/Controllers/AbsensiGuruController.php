<?php

namespace App\Http\Controllers;

// use App\Models\AbsensiGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guru;

class AbsensiGuruController extends Controller
{
    public function index()
    {
        $guru = Auth::guard('guru')->user();
        $guru = Guru::with('mataPelajaran')->find($guru->id);

        return view('absensi_guru', compact('guru'));
    }

    public function uploadFotoSampul(Request $request)
    {
        $request->validate([
            'foto_sampul' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $guru = Auth::guard('guru')->user();
        $guru = Guru::find($guru->id);

        if ($request->hasFile('foto_sampul')) {
            // Hapus foto sampul lama jika ada
            if ($guru->foto_sampul) {
                Storage::delete('public/foto_sampul_guru/' . $guru->foto_sampul);
            }

            $fileName = time() . '.' . $request->foto_sampul->extension();
            $request->foto_sampul->storeAs('public/foto_sampul_guru', $fileName);
            $guru->foto_sampul = $fileName;
            $guru->save();
        }

        return redirect()->back()->with('success', 'Foto sampul berhasil diupdate.');
    }
}
