<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller; 
use App\Models\Ujian;
use App\Models\Soal;

class SiswaUjianController extends Controller // Sekarang ini akan berjalan dengan lancar!
{
    public function dashboard()
    {
        // ... kode dashboard Anda tetap sama ...
        $ujian = Ujian::with(['mapel','guru'])
            ->withCount('soals') // 💡 Tip: jika relasinya 'soals', pastikan huruf s di belakangnya sesuai
            ->get();

        return view('siswa.dashboard', compact('ujian'));
    }

    public function pilihUjian()
    {
        // Ambil data ujian yang statusnya Aktif, diurutkan dari yang terbaru
        $ujian = \App\Models\Ujian::with(['guru.user'])
                    ->withCount('soals') // Menghitung otomatis jumlah soal terkait (asumsi nama relasi: soals)
                    ->where('status', '!=', 'Draft')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('siswa.pilih_ujian', compact('ujian')); // Sesuaikan nama file view Anda
    }

    public function myExams()
    {
        $siswa_id = auth()->user()->id; // Mengambil ID siswa yang sedang login

        // Mengambil histori ujian siswa dari model Ujian yang pernah dikerjakan
        // Asumsi: Anda memiliki relasi atau tabel nilai yang menyimpan hasil ujian siswa
        // Di sini kita contohkan mengambil data ujian melalui model Ujian yang memiliki status selesai bagi siswa
        $histori_ujian = Ujian::whereHas('nilai', function($query) use ($siswa_id) {
                                $query->where('user_id', $siswa_id); // atau siswa_id sesuai kolom database Anda
                            })
                            ->with(['mapel', 'nilai' => function($query) use ($siswa_id) {
                                $query->where('user_id', $siswa_id);
                            }])
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('siswa.my_exams', compact('histori_ujian'));
    }
}