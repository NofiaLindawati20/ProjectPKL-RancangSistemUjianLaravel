<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\Ujian;

class DataSoalController extends Controller
{
    // tampil kelola soal
    public function index()
    {
        $ujians = Ujian::withCount('soals')->orderBy('created_at', 'desc')->get();

        $total_paket = Ujian::count();
        $total_soal = Soal::count();

        // Selesai Dikerjakan (Jumlah siswa aktif / yang terdaftar mengerjakan)
        //$total_selesai = DB::table('siswas')->count(); 

        // Sedang Berlangsung (Jumlah ujian yang dijadwalkan hari ini)
        //$hari_ini = Carbon::today()->toDateString();
        //$total_berlangsung = Ujian::where('tanggal_ujian', $hari_ini)->count();

        return view('guru.datasoal', compact(
            'ujians',
            'total_paket', 
            'total_soal', 
            ));
    }

    // simpan soal
    public function store(Request $request, $ujian_id)
    {
        Soal::create([
            'ujian_id' => $ujian_id,
            'pertanyaan' => $request->pertanyaan,
            'tipe' => $request->tipe,
            'a' => $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d,
            'jawaban_benar' => $request->jawaban_benar
        ]);

        return back()->with('success','Soal berhasil ditambah');
    }

    // hapus soal
    public function destroy($id)
    {
        Soal::destroy($id);
        return back()->with('success','Soal berhasil dihapus');
    }

    public function detail($ujian_id)
    {
        $ujian = Ujian::findOrFail($ujian_id);
        $soals = Soal::where('ujian_id',$ujian_id)->get();

        return view('guru.detailsoal', compact('ujian','soals'));
    }





}