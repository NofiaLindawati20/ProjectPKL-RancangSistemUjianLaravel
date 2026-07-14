<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    /**
     * TAMPILAN UTAMA KELOLA USER (Menampilkan Tabel & Statistik)
     * Ini fungsi yang dicari oleh Laravel (index)
     */
    public function index(Request $request)
    {
        // 1. Hitung data statistik dari database
        $totalGuru = User::where('role', 'guru')->count();
        $totalSiswa = User::where('role', 'siswa')->count();
        $totalAdmin = User::where('role', 'admin')->count();

        // 2. Logika Pencarian nama/email
        $search = $request->input('search');
        $users = User::when($search, function($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
        })->get();

        // 3. Return ke view kelola user
        return view('admin.kelolauser', compact('totalGuru', 'totalSiswa', 'totalAdmin', 'users'));
    }

    /**
     * HALAMAN FORM TAMBAH USER BARU
     */
    public function create()
    {
        return view('admin.tambah-user');
    }

    /**
     * PROSES SIMPAN DATA KE DATABASE
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'role'     => 'required|in:siswa,guru,admin,pengawas',
            'password' => 'required|string|min:3',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'     => $request->role,
            'password' => $request->password, // Disimpan plain text sesuai DB kamu
        ]);

        return redirect()->route('admin.users')->with('success', 'User baru berhasil ditambahkan!');
    }

    public function dataUtama() // atau nama fungsi sesuai route datautama kamu
{
    // Ambil data kelas dari database
    $kelas_list = \App\Models\Kelas::all();

    // Kirim ke view datautama
    return view('admin.datautama', compact('kelas_list'));
}

    // 1. Tampilkan Halaman Edit Bersama Data User yang Dipilih
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }

    // 2. Eksekusi Perubahan Data ke Database
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role'  => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        // Password hanya di-hash dan diganti jika input formulir diisi oleh Admin
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect('/admin/user')->with('success', 'Data pengguna berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()
            ->route('admin.users')
            ->with('success', 'Data pengguna berhasil dihapus!');
    }

}