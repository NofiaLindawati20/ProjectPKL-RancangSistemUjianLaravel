<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ujian;
use App\Models\Jawaban;
use App\Models\NilaiUjian;


class SelesaiController extends Controller
{
    public function index($ujian_id)
    {
        // 1. Amankan pengecekan login siswa
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // 2. Cari data ujian, jika tidak ada langsung arahkan kembali (mencegah blank)
        $ujian = Ujian::find($ujian_id);
        if (!$ujian) {
            return redirect('/siswa')->with('error', 'Data ujian tidak ditemukan.');
        }

        $siswa_id = auth()->id();

        // 3. Ambil semua jawaban milik siswa pada ujian ini
        $jawaban = Jawaban::where('ujian_id', $ujian_id)
                        ->where('siswa_id', $siswa_id)
                        ->get();

        // 4. Hitung statistik nilai
        $total = $jawaban->count();
        $benar = $jawaban->where('is_benar', 1)->count();
        $nilai = $total > 0 ? round(($benar / $total) * 100) : 0;

        // 5. 🌟 OTOMATIS SIMPAN/UPDATE KE TABEL NILAI_UJIANS
        // Langkah ini penting agar histori ujian di halaman "My Exams" langsung terisi
        NilaiUjian::updateOrCreate(
            [
                'user_id'  => $siswa_id,
                'ujian_id' => $ujian_id,
            ],
            [
                'nilai'    => $nilai,
            ]
        );

        // 6. Pastikan file 'resources/views/siswa/selesai.blade.php' Anda ada nilainya
        return view('siswa.selesai', compact('ujian', 'nilai', 'total', 'benar'));
    }
}