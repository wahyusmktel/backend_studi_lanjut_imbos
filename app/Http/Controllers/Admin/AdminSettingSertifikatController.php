<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SettingSertifikat;
use Illuminate\Http\Request;

class AdminSettingSertifikatController extends Controller
{
    public function index(Request $request)
    {
        $query = SettingSertifikat::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama_template', 'like', '%' . $search . '%');
        }

        $settingsertifikats = $query->paginate(10);

        return view('admin.setting_sertifikat.index', compact('settingsertifikats'));
    }
}
