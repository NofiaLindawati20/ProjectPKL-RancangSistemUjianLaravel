<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\AnalisisSiswa;

class AnalisisSiswaController extends Controller
{
    public function index()
    {
        $data = AnalisisSiswa::with('siswa')->get();

        // 🔥 statistik utama
        $nilai_tertinggi = $data->max('nilai_akhir');
        $nilai_terendah = $data->min('nilai_akhir');
        $rata = $data->avg('nilai_akhir');

        // 🔥 siswa remedial
        $remedial = $data->where('nilai_akhir','<',$rata);

        // 🔥 simulasi analisis soal (dummy sementara)
        $mudah = 15;
        $sedang = 7;
        $sulit = 3;

        return view('guru.analisis-siswa', compact(
            'data',
            'nilai_tertinggi',
            'nilai_terendah',
            'rata',
            'remedial',
            'mudah',
            'sedang',
            'sulit'
        ));
    }
}