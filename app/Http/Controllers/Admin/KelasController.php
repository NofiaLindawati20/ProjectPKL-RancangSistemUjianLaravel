<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // Menampilkan form tambah kelas
    public function create()
    {
        return view('admin.tambah_kelas');
    }

    // Memproses data form dan disimpan ke DB
    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'nama_kelas'   => 'required|string|max:255',
            'wali_kelas'   => 'required|string|max:255',
            'jumlah_siswa' => 'required|integer|min:0',
        ], [
            'nama_kelas.required'   => 'Nama kelas wajib diisi.',
            'wali_kelas.required'   => 'Nama wali kelas wajib diisi.',
            'jumlah_siswa.required' => 'Jumlah siswa wajib diisi.',
            'jumlah_siswa.integer'  => 'Jumlah siswa harus berupa angka komputer.',
        ]);

        // Simpan data ke tabel kelas
        Kelas::create([
            'nama_kelas'   => $request->nama_kelas,
            'wali_kelas'   => $request->wali_kelas,
            'jumlah_siswa' => $request->jumlah_siswa,
        ]);

        // Alihkan kembali ke menu utama/data utama dengan alert sukses
        return redirect()->route('admin.datautama')->with('success', 'Kelas baru berhasil ditambahkan!');
    }

    // 1. Ambil data kelas lama dan arahkan ke halaman edit
    public function edit($id)
    {
        // Mengambil data kelas bersama hitungan jumlah siswanya sekaligus
        $kelas = Kelas::findOrFail($id);
        
        // Hitung jumlah siswa secara manual langsung dari tabel siswa
        $kelas->siswas_count = \Illuminate\Support\Facades\DB::table('siswas')
                                ->where('kelas_id', $id)
                                ->count();
                                
        return view('admin.edit_kelas', compact('kelas'));
    }

    // 2. Simpan perubahan data kelas ke database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'wali_kelas' => 'required|string|max:255',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->wali_kelas = $request->wali_kelas;
        $kelas->save();

        return redirect('/admin/datautama')->with('success', 'Data ruang kelas berhasil diperbarui!');
    }


    public function destroy($id)
    {
        
        $kelas = Kelas::findOrFail($id);
        
        $kelas->delete();

        return redirect()
        ->route('admin.datautama')
        ->with('success', 'Data Kelas berhasil dihapus!');

    }


}