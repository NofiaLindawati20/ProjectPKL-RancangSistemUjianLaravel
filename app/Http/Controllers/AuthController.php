<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // tampilkan halaman login
    public function loginForm()
    {
        return view('auth.login');
    }

    // proses login
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        if(Auth::attempt($data)){
            // TAMBAHKAN BARIS INI: Mengamankan session baru agar tidak bisa dibajak
            $request->session()->regenerate();

            return redirect('/redirect');
        }

        return back()->with('error','Login gagal, Email / password / pengguna salah');
    }

    // redirect sesuai role
    public function redirect()
    {
        $role = auth()->user()->role;

        if($role == 'admin'){
            return redirect('/admin'); // Sesuaikan ke rute dashboard admin utama kamu
        } elseif($role == 'guru'){
            return redirect('/guru');
        } elseif($role == 'siswa'){
            return redirect('/siswa');
        } else {
            return redirect('/pengawas/pilih-ruang');
        }
    }

    // proses logout
    public function logout(Request $request) // Tambahkan Request $request
    {
        Auth::logout();
        
        // TAMBAHKAN 2 BARIS INI: Menghapus total session lama agar bersih setelah keluar
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}