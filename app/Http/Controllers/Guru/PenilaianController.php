<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ujian;
use App\Models\Kelas;
use App\Models\Penilaian;

class PenilaianController extends Controller
{
    // URL: /guru/penilaian (Hanya menampilkan daftar paket soal)
    public function index()
    {
        $daftar_ujian = Ujian::all();
        return view('guru.penilaian', compact('daftar_ujian'));
    }

    // URL: /guru/penilaian/siswa (Menampilkan file penilaian_siswa.blade.php)
    public function siswa(Request $request)
    {
        // Pastikan parameter ujian_id ada di URL
        if (!$request->has('ujian_id')) {
            return redirect('/guru/penilaian')->with('error', 'Silahkan pilih paket ujian terlebih dahulu.');
        }

        $ujian_terpilih = Ujian::find($request->ujian_id);
        $daftar_kelas = Kelas::all();

        // Query data siswa yang sudah mengerjakan ujian terpilih
        $query = Penilaian::with(['siswa.kelas'])->where('ujian_id', $request->ujian_id);

        // Filter jika guru memilih kelas tertentu
        if ($request->filled('kelas_id')) {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('kelas_id', $request->kelas_id);
            });
        }

        $penilaians = $query->get();

        return view('guru.penilaian_siswa', compact('ujian_terpilih', 'daftar_kelas', 'penilaians'));
    }

    // URL: /guru/penilaian/koreksi/{id} (Halaman periksa esai)
    public function koreksi($id)
    {
        $penilaian = Penilaian::with('siswa', 'ujian')->findOrFail($id);
        return view('guru.koreksi_essay', compact('penilaian'));
    }

    // Aksi POST: Menyimpan nilai esai & menghitung Nilai Akhir otomatis beserta status kelulusan
    public function simpanKoreksi(Request $request, $id)
    {
        $penilaian = Penilaian::findOrFail($id);
        
        // Menangkap input nilai_essay dari form input guru
        $penilaian->nilai_essay = $request->input('nilai_essay');
        
        // HITUNG NILAI AKHIR (Bobot: PG 60% + Essay 40%)
        $penilaian->nilai_akhir = ($penilaian->nilai_pg * 0.6) + ($penilaian->nilai_essay * 0.4);
        
        // Ubah status esay menjadi selesai sesuai dengan kolom database
        $penilaian->status_esay = 'selesai';
        $penilaian->save();

        // Diarahkan kembali ke rute panel siswa beserta ID ujian yang aktif
        return redirect('/guru/penilaian/siswa?ujian_id=' . $penilaian->ujian_id)
               ->with('success', 'Nilai esai berhasil disimpan!');
    }
}