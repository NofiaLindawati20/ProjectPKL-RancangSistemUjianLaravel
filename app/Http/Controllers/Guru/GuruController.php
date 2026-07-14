<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Ujian;
use App\Models\Soal;

class GuruController extends Controller
{
    public function dashboard()
    {
        $jumlahUjian = Ujian::count();
        $jumlahSoal = Soal::count();

        return view('guru.dashboard', compact('jumlahUjian','jumlahSoal'));
    }
}