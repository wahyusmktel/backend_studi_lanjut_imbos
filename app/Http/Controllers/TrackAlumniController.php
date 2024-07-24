<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\JenisPt;
use App\Models\Testimonials;
use Illuminate\Http\Request;

class TrackAlumniController extends Controller
{
    public function index()
    {
        $testimonials = Testimonials::with('alumni')->get();
        $jenisPt = JenisPt::all();
        $alumnis = Alumni::with('jenisPt')->get();

        // Data untuk grafik
        $chartData = $jenisPt->map(function ($jenis) {
            return [
                'label' => $jenis->nama_jenis_pt,
                'count' => $jenis->alumnis()->count()
            ];
        });

        return view('track_alumni', compact('testimonials', 'jenisPt', 'alumnis', 'chartData'));
    }

    public function show($id)
    {
        $alumni = Alumni::with('jenisPt')->findOrFail($id);
        return view('detail_alumni', compact('alumni'));
    }
}
