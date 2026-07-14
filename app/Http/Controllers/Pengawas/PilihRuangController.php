<?php

namespace App\Http\Controllers\Pengawas;

use App\Http\Controllers\Controller;
use App\Models\Ruang;

class PilihRuangController extends Controller
{
    public function index()
    {
        $ruangs = Ruang::all();

        return view('pengawas.pilih-ruang', compact('ruangs'));
    }
}
