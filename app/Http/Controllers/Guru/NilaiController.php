<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\NilaiUjian;
use Illuminate\Http\Request;
use App\Models\Ujian;
use App\Models\Kelas;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        $ujian_id = $request->ujian_id;
        $kelas_id = $request->kelas_id;

        // ambil ujian milik guru
        $ujians = Ujian::where('guru_id', auth()->id())->get();

        // default kosong (ANTI ERROR)
        $penilaians = collect();
        $ujian_terpilih = null;

        if ($ujian_id) {
            $ujian_terpilih = Ujian::find($ujian_id);

            $penilaians = NilaiUjian::with(['siswa'])
                ->where('ujian_id', $ujian_id)
                ->when($kelas_id, function ($q) use ($kelas_id) {
                    $q->whereHas('siswa', function ($q2) use ($kelas_id) {
                        $q2->where('kelas_id', $kelas_id);
                    });
                })
                ->get();
        }

        // ambil daftar kelas
        $daftar_kelas = Kelas::all();

        return view('guru.penilaian_siswa', compact(
            'penilaians',
            'ujian_terpilih',
            'daftar_kelas',
            'ujians'
        ));
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function ujian()
    {
        return $this->belongsTo(Ujian::class, 'ujian_id');
    }



    
}