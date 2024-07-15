<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminGuruController extends Controller
{
    public function index()
    {
        return view('admin.guru.data_guru');
    }
}