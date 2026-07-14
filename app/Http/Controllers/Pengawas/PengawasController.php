<?php

namespace App\Http\Controllers\Pengawas;

use App\Http\Controllers\Controller;
use App\Models\BeritaAcara;

class PengawasController extends Controller
{
    public function dashboard()
    {
        return view('pengawas.pilihruang');
    }
    
    public function historiPengawasan()
    {
        // Pastikan user pengawas sudah login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $pengawas_id = auth()->user()->id;

        // Mengambil histori berita acara yang dibuat oleh pengawas ini
        $histori_berita = BeritaAcara::where('pengawas_id', $pengawas_id)
                            ->with(['ujian.mapel']) // Eager loading relasi ujian dan mapel
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('pengawas.berita_acara_histori', compact('histori_berita'));
    }
}