<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Ujian; // Pastikan nama model Anda Ujian (sesuai tabel ujians)
use App\Models\Soal;
use App\Models\Mapel;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    public function create()
    {
        $data_mapel = Mapel::all();
        $data_kelas = Kelas::all();
        return view('guru.buat_soal', compact('data_mapel', 'data_kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ujian'    => 'required|string',
            'mapel'         => 'required|string',
            'kelas'         => 'required|string',
            'durasi'        => 'required|integer',
            'tanggal_ujian' => 'required|date',
        ]);

       // Nilai default cadangan jika tidak ditemukan (mengambil ID guru yang sedang login)
        $guruId = auth()->id(); 

        // 2. Cari baris mapel berdasarkan nama_mapel yang dipilih dari form
        $mapelTerpilih = \App\Models\Mapel::where('nama_mapel', $request->mapel)->first();

        if ($mapelTerpilih && $mapelTerpilih->guru_pengampu) {
            // 3. Cari ID User/Guru di tabel users berdasarkan nama di kolom 'guru_pengampu'
            // Catatan: Ganti \App\Models\User jika Anda menggunakan model lain untuk data guru (misal: \App\Models\Guru)
            // Dan pastikan nama kolom di tabel tersebut adalah 'name' atau 'nama'
            $userGuru = \App\Models\User::where('name', $mapelTerpilih->guru_pengampu)
                                        ->orWhere('name', $mapelTerpilih->guru_pengampu)
                                        ->first();

            if ($userGuru) {
                $guruId = $userGuru->id; // ID angka berhasil ditemukan dan diambil!
            }
        }

        // 1. Simpan Data Ujian Utama ke tabel 'ujians'
        $ujian = Ujian::create([
            'nama_ujian'    => $request->nama_ujian,
            'mapel'         => $request->mapel,
            'kelas'         => $request->kelas,
            'durasi'        => $request->durasi,
            'tanggal_ujian' => $request->tanggal_ujian,
            'acak_jawaban'  => $request->has('acak_jawaban') ? 1 : 0,
            'acak_soal'     => $request->has('acak_soal') ? 1 : 0,
            'guru_id'       => $guruId, // 🔥 FILTER KUNCI
            
        ]);

        // 2. Loop & Simpan Soal Dinamis
        if ($request->has('soals')) {
            foreach ($request->soals as $index => $dataSoal) {
                
                $soalData = [
                    'ujian_id'      => $ujian->id,
                    'tipe'          => $dataSoal['tipe'],
                    'pertanyaan'    => $dataSoal['pertanyaan'],
                    'poin'          => $dataSoal['poin'] ?? 5,
                    'jawaban_benar' => $dataSoal['jawaban_benar'] ?? null,
                ];

                // Handle Upload Gambar Soal jika ada
                if (isset($dataSoal['gambar_soal'])) {
                    $fileName = time() . '_soal_' . $index . '.' . $dataSoal['gambar_soal']->extension();
                    $dataSoal['gambar_soal']->move(public_path('uploads/soal'), $fileName);
                    $soalData['gambar_soal'] = $fileName;
                }

                // Jika tipe PG, tangani pilihan jawaban & upload gambarnya
                if ($dataSoal['tipe'] === 'pg') {
                    $pilihans = ['a', 'b', 'c', 'd', 'e'];
                    foreach ($pilihans as $pil) {
                        // Teks pilihan
                        $soalData[$pil] = $dataSoal[$pil] ?? null;

                        // Gambar pilihan
                        if (isset($dataSoal['gambar_' . $pil])) {
                            $filePilName = time() . '_' . $pil . '_' . $index . '.' . $dataSoal['gambar_' . $pil]->extension();
                            $dataSoal['gambar_' . $pil]->move(public_path('uploads/soal'), $filePilName);
                            $soalData['gambar_' . $pil] = $filePilName;
                        }
                    }
                }

                Soal::create($soalData);
            }
        }

        return redirect()->route('guru.datasoal')->with('success', 'Seluruh soal ujian berhasil disimpan!');
    }
}