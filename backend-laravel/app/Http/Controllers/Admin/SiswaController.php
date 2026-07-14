<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\User;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index()
    {
        // Mengambil data siswa sekaligus memuat data kelas yang terhubung melalui kelas_id
        $siswa_list = \App\Models\Siswa::with('kelas')->orderBy('nama_siswa', 'asc')->get();

        return view('admin.datautama', compact('siswa_list')); // Sesuaikan dengan nama view kamu
    }

    // 1. Tampilkan Halaman Form Tambah Siswa
    public function create()
    {
        // Mengambil semua data kelas untuk isi dropdown select di form
        $data_kelas = Kelas::all();
        return view('admin.tambah_siswa', compact('data_kelas'));
    }

    // 2. Proses Simpan Data Siswa & Akun Login ke Database
    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'kelas_id'   => 'required|exists:kelas,id',
            'nama_siswa' => 'required|string|max:255',
            'nis'        => 'required|string|unique:siswas,nis|max:20',
            'nisn'       => 'required|string|unique:siswas,nisn|max:20',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:6',
        ]);

        // Menggunakan Database Transaction agar jika salah satu simpan gagal, data tidak kotor
        DB::beginTransaction();

        try {
            // A. Buat akun login siswa di tabel 'users'
            $user = User::create([
                'name'     => $request->nama_siswa,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'role'     => 'siswa', // Otomatis mengisi role sebagai siswa
            ]);

            // B. Buat profil data fisik siswa di tabel 'siswas'
            Siswa::create([
                'user_id'    => $user->id, // Mengambil ID dari user yang baru saja terbuat
                'kelas_id'   => $request->kelas_id,
                'nama_siswa' => $request->nama_siswa,
                'nis'        => $request->nis,
                'nisn'       => $request->nisn,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Data siswa dan akun login berhasil ditambahkan!');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }



}