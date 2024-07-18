<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('absensi');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nip', 'password');

        if (Auth::guard('guru')->attempt($credentials)) {
            return redirect()->intended('/absensi-guru');
        }

        return redirect()->back()->with('error', 'NIP atau password salah.');
    }

    public function logout()
    {
        Auth::guard('guru')->logout();
        return redirect()->route('guru.login');
    }
}
