<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    protected $redirectTo = '/dashboard'; // Ganti dengan halaman sesuai kebutuhan

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard();
    }
    public function showLogin()
    {
        // Jika belum login, tampilkan formulir login
        // Cek apakah pengguna sudah login
        if (Auth::guard('pegawai')->check()) {
            return redirect()->route('pegawai-dashboard');
        } elseif (Auth::guard('pelanggan')->check()) {
            return redirect()->route('pelanggan-dashboard');
        }

        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Tambahkan logic untuk memeriksa jenis pengguna (pegawai atau pelanggan)
        if ($request->jabatan == 'Pegawai' && Auth::guard('pegawai')->attempt($credentials)) {
            // Login sebagai pegawai berhasil
            return redirect()->route('pegawai-dashboard');
        } elseif ($request->jabatan == 'Pelanggan' && Auth::guard('pelanggan')->attempt($credentials)) {
            // Login sebagai pelanggan berhasil
            return redirect()->route('pelanggan-dashboard');
        } else {
            // Login gagal
            return redirect('/login')->with('error', 'Email dan Password Anda Salah');
        }
    }
    public function logout()
    {
        // Logout dari guard 'pegawai' jika sedang login sebagai pegawai
        if (Auth::guard('pegawai')->check()) {
            Auth::guard('pegawai')->logout();
        }

        // Logout dari guard 'pelanggan' jika sedang login sebagai pelanggan
        if (Auth::guard('pelanggan')->check()) {
            Auth::guard('pelanggan')->logout();
        }

        return redirect('/');
    }
}