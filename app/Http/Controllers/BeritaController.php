<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // public function index()
    // {
    //     $beritas = Berita::with('kategori', 'author')->get();
    //     return view('berita', compact('beritas'));
    // }

    public function index()
    {
        $beritas = Berita::with(['author', 'kategori'])->get();
        return view('berita', compact('beritas'));
    }

    public function show($id)
    {
        $berita = Berita::with(['author', 'kategori', 'komentars'])->findOrFail($id);
        return view('detail_berita', compact('berita'));
    }
}
