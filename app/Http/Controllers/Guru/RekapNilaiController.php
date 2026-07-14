<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\RekapNilai;

class RekapNilaiController extends Controller
{
    public function index()
    {
        $data = RekapNilai::with('siswa')->get();

        // hitung statistik
        $rata = $data->avg('nilai_akhir');
        $tuntas = $data->where('nilai_akhir','>=',75)->count();
        $remedial = $data->where('nilai_akhir','<',75)->count();

        return view('guru.rekap-nilai-guru', compact(
            'data','rata','tuntas','remedial'
        ));
    }
}