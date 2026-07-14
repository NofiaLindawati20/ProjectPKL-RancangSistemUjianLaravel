<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // 1. Validasi input form
        $credentials = $request->validate([
            'email'    => 'required|string', // bisa email atau username tergantung setup DB
            'password' => 'required|string',
            'role'     => 'required|string|in:siswa,guru,admin,pengawas',
        ]);

        // 2. Coba proses Autentikasi ke database
        // Catatan: Pastikan di tabel users kamu memiliki kolom 'role'
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => $request->role])) {
            $request->session()->regenerate();

            // 3. Pengalihan halaman (Redirect) otomatis berdasarkan role yang dipilih
            switch ($request->role) {
                case 'admin':
                    return redirect()->route('admin.datautama');
                case 'guru':
                    return redirect()->intended('/guru/dashboard');
                case 'pengawas':
                    return redirect()->intended('/pengawas/dashboard');
                case 'siswa':
                default:
                    return redirect()->intended('/siswa/dashboard');
            }
        }

        // Jika gagal, kembalikan ke halaman login dengan pesan error
        return back()->with('error', 'Email, Password, atau Role yang Anda pilih tidak cocok!');
    }
}