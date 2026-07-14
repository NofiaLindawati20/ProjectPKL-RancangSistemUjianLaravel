<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\User;

class DataUtamaController extends Controller
{
    // Menampilkan Halaman Utama (Master Data Kelas & Mapel)
    public function index()
    {
        $kelas_list = Kelas::all();
        $mapel_list = Mapel::all(); 
        $siswa_list = Siswa::with('kelas')->get();

        /// 1. Tambahkan variabel tahun_aktif yang dicari oleh Blade
        $tahun_aktif = "2025/2026 Ganjil"; // Sesuaikan dengan tahun berjalan kamu

        // 2. Hitung total data langsung dari database untuk statistik card
        $total_kelas = Kelas::count();
        $total_mapel = Mapel::count(); 

        // 3. Pastikan 'tahun_aktif' ikut dikirim di dalam compact()
        return view('admin.datautama', compact('kelas_list', 'mapel_list', 'siswa_list', 'total_kelas', 'total_mapel', 'tahun_aktif'));
    }

    // Menampilkan Form Tambah Mata Pelajaran
    public function createMapel()
    {
        return view('admin.tambah_mapel');
    }

    // Memproses dan Menyimpan Mata Pelajaran ke Database
    public function storeMapel(Request $request)
    {
        $request->validate([
            'kode'          => 'required|string|max:50|unique:mapel,kode',
            'nama_mapel'    => 'required|string|max:255',
            'kategori'      => 'required|string',
            'guru_pengampu' => 'required|string|max:255',
        ], [
            'kode.required'          => 'Kode mata pelajaran wajib diisi.',
            'kode.unique'            => 'Kode mata pelajaran ini sudah terdaftar.',
            'nama_mapel.required'    => 'Nama mata pelajaran wajib diisi.',
            'kategori.required'      => 'Pilih kategori kelompok mata pelajaran.',
            'guru_pengampu.required' => 'Nama guru pengampu wajib diisi.',
        ]);

        Mapel::create([
            'kode'          => strtoupper($request->kode),
            'nama_mapel'    => $request->nama_mapel,
            'kategori'      => $request->kategori,
            'guru_pengampu' => $request->guru_pengampu,
        ]);

        return redirect()->route('admin.datautama')->with('success', 'Mata pelajaran baru berhasil ditambahkan!');
    }

public function editMapel($id)
{
    $mapel = Mapel::findOrFail($id);
    return view('admin.edit_mapel', compact('mapel'));
}

public function updateMapel(Request $request, $id)
{
    $request->validate([
        'kode'          => 'required|string|max:50',
        'kategori'      => 'required|string|max:255',
        'nama_mapel'    => 'required|string|max:255',
        'guru_pengampu' => 'required|string|max:255',
    ]);

    $mapel = Mapel::findOrFail($id);

    $mapel->kode = $request->kode;
    $mapel->kategori = $request->kategori;
    $mapel->nama_mapel = $request->nama_mapel;
    $mapel->guru_pengampu = $request->guru_pengampu;

    $mapel->save();

    return redirect()
        ->route('admin.datautama')
        ->with('success', 'Data mata pelajaran berhasil diperbarui!');
}



public function destroyMapel($id)
    {
        
        $mapel = Mapel::findOrFail($id);
        
        $mapel->delete();

        return redirect()
        ->route('admin.datautama')
        ->with('success', 'Data Kelas berhasil dihapus!');

    }




}