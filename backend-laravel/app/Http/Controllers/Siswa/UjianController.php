<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ujian;
use App\Models\Soal;
use App\Models\Jawaban;

class UjianController extends Controller
{
    // 1. Tampilkan Halaman Ujian beserta Soal-soalnya (Sistem Navigasi & Auto-Load)
    public function index(Request $request, $id)
    {
        // Mengambil data ujian beserta relasi mata pelajaran
        $ujian = Ujian::with('mapel')->find($id);

        if (!$ujian) {
            return redirect()->back()->with('error', '❌ Data ujian tidak ditemukan.');
        }

        // Ambil semua ID soal yang terikat dengan ujian ini untuk penomoran sidebar
        $all_soal_ids = Soal::where('ujian_id', $id)->orderBy('id', 'asc')->pluck('id')->toArray();
        
        if (empty($all_soal_ids)) {
            return redirect()->back()->with('error', '❌ Belum ada soal di dalam ujian ini.');
        }

        // Ambil nomor urut soal saat ini dari parameter URL (?page=14)
        $current_number = (int) $request->get('page', 1);
        
        // Validasi batasan nomor urut halaman
        if ($current_number < 1 || $current_number > count($all_soal_ids)) {
            return redirect()->to("/siswa/ujian/{$id}?page=1");
        }

        // Ambil data 1 soal yang aktif berdasarkan nomor halaman saat ini
        $soal_id_aktif = $all_soal_ids[$current_number - 1];
        $soal = Soal::find($soal_id_aktif);

        // Ambil jawaban yang pernah disimpan sebelumnya oleh siswa pada soal ini
        $jawaban_user = Jawaban::where([
            'siswa_id' => auth()->id(),
            'soal_id'  => $soal_id_aktif,
            'ujian_id' => $id
        ])->first();

        $jawaban_saved = $jawaban_user ? $jawaban_user->jawaban : '';
        $is_ragu = $jawaban_user ? (bool)$jawaban_user->is_ragu : false;

        // Ambil daftar status seluruh jawaban siswa untuk mewarnai kotak nomor di sidebar
        $jawaban_blocks = Jawaban::where([
            'siswa_id' => auth()->id(),
            'ujian_id' => $id
        ])->get()->keyBy('soal_id')->toArray();

        $list_status_jawaban = [];
        foreach ($all_soal_ids as $idSoal) {
            $list_status_jawaban[$idSoal] = [
                'terisi' => isset($jawaban_blocks[$idSoal]) && !empty($jawaban_blocks[$idSoal]['jawaban']),
                'ragu'   => isset($jawaban_blocks[$idSoal]) ? (int)$jawaban_blocks[$idSoal]['is_ragu'] : 0
            ];
        }

        // Hitung jumlah soal yang sudah dijawab
        $total_terjawab = Jawaban::where([
            'siswa_id' => auth()->id(),
            'ujian_id' => $id
        ])->whereNotNull('jawaban')->where('jawaban', '!=', '')->count();

        // Mengirimkan variabel ke view sesuai struktur asli ujian.blade.php
        return view('siswa.ujian', compact(
            'ujian', 
            'soal', 
            'current_number', 
            'all_soal_ids', 
            'jawaban_saved', 
            'is_ragu', 
            'list_status_jawaban', 
            'total_terjawab'
        ));
    }

    // 2. AJAX AUTO-SAVE JAWABAN (Pilihan Ganda & Essay)
    public function saveAjax(Request $request)
    {
        $soal_id = $request->input('soal_id');
        $nilai_jawaban = $request->input('jawaban');
        
        $soal = Soal::find($soal_id);
        if (!$soal) {
            return response()->json(['status' => 'error', 'message' => 'Soal tidak ditemukan'], 404);
        }

        // Jika PG langsung hitung kebenaran kunci jawaban, jika essay set 0 dahulu
        $benar = 0;
        if ($soal->jenis_soal != 'essay' && $soal->jenis_soal != 'uraian') {
            $benar = ($nilai_jawaban == $soal->jawaban_benar) ? 1 : 0;
        }

        Jawaban::updateOrCreate(
            [
                'siswa_id' => auth()->id(),
                'soal_id'  => $soal_id,
                'ujian_id' => $soal->ujian_id
            ],
            [
                'jawaban'  => $nilai_jawaban,
                'is_benar' => $benar
            ]
        );

        return response()->json(['status' => 'success']);
    }

    // 3. AJAX SAVE STATUS RAGU-RAGU
    public function toggleRagu(Request $request)
    {
        $soal_id = $request->input('soal_id');
        $ragu_status = $request->input('ragu'); // nilai 1 atau 0
        
        $soal = Soal::find($soal_id);

        Jawaban::updateOrCreate(
            [
                'siswa_id' => auth()->id(),
                'soal_id'  => $soal_id,
                'ujian_id' => $soal->ujian_id
            ],
            [
                'is_ragu' => $ragu_status
            ]
        );

        return response()->json(['status' => 'success']);
    }

    // 4. SUBMIT SELESAI MANUAL ATAU SISA WAKTU HABIS
    public function submit(Request $request, $id)
    {
        // Logika penguncian ujian siswa bisa ditaruh di sini
        return redirect()->route('ujian.selesai', $id)->with('success', 'Ujian selesai!');
    }

    public function uploadFoto(Request $request)
    {
        $request->validate([
            'soal_id' => 'required',
            'foto_jawaban' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->file('foto_jawaban')) {
            // Menyimpan gambar ke folder storage/app/public/foto_jawaban
            $path = $request->file('foto_jawaban')->store('foto_jawaban', 'public');

            // Melakukan update database di tabel Jawaban siswa terkait
            \App\Models\Jawaban::updateOrCreate(
                [
                    'siswa_id' => auth()->id(),
                    'soal_id'  => $request->soal_id,
                    'ujian_id' => \App\Models\Soal::find($request->soal_id)->ujian_id
                ],
                [
                    'foto_jawaban' => $path // Pastikan kolom 'foto_jawaban' sudah ditambahkan di migrasi tabel jawaban kamu
                ]
            );

            return response()->json([
                'status' => 'success',
                'path' => asset('storage/' . $path)
            ]);
        }

        return response()->json(['status' => 'error', 'message' => 'File tidak valid'], 400);
    }

}