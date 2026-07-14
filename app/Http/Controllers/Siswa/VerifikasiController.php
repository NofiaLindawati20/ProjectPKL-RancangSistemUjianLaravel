<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ujian;
use App\Models\Siswa;
use App\Models\WajahSiswa;

class VerifikasiController extends Controller
{
    public function index($id)
    {
        return view('siswa.verifikasi', compact('id'));
    }

    public function proses(Request $request, $id)
    {
        return redirect('/ujian/'.$id);
    }

    // 1. Menampilkan halaman pendaftaran wajah untuk admin
    public function showRegistrasi()
    {
        $siswas = Siswa::with('kelas')->get();
        return view('admin.registrasi_wajah', compact('siswas'));
    }

    // 2. Aksi POST menyimpan data vektor wajah ke database
    public function storeRegistrasi(Request $request)
    {
        try {
            $request->validate([
                'siswa_id'   => 'required',
                'descriptor' => 'required|array'
            ]);

            DB::table('wajah_siswa')->updateOrInsert(
                ['siswa_id' => $request->siswa_id],
                [
                    'descriptor' => json_encode($request->descriptor),
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );

            return response()->json(['status' => 'success']);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // 3. Aksi POST Verifikasi Wajah Siswa sebelum Ujian
    public function verifikasiSiswa(Request $request, $ujian_id)
    {
        try {
            // Ambil ID siswa aktif
            $siswa_id = auth()->user()->siswa_id ?? auth()->id(); 

            // Ambil data wajah terdaftar menggunakan Model Eloquent
            $wajahTerdaftar = WajahSiswa::where('siswa_id', $siswa_id)->first();

            if (!$wajahTerdaftar) {
                return response()->json([
                    'status' => 'error', 
                    'message' => 'Vektor wajah belum terdaftar! Silakan hubungi Admin.'
                ], 404);
            }

            $descriptorBrowser = $request->input('descriptor');
            $descriptorDatabase = json_decode($wajahTerdaftar->descriptor, true);

            // Validasi format data array descriptor
            if (!is_array($descriptorBrowser) || !is_array($descriptorDatabase)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Format data wajah tidak valid.'
                ], 400);
            }

            // 4. HITUNG KEMIRIPAN WAJAH (Euclidean Distance dengan konversi float)
            $distance = 0;
            foreach ($descriptorBrowser as $key => $value) {
                if (isset($descriptorDatabase[$key])) {
                    $distance += pow((float)$value - (float)$descriptorDatabase[$key], 2);
                }
            }
            $distance = sqrt($distance);

            // 5. Batas Toleransi Kecocokan (Threshold)
            if ($distance <= 0.55) {
                // Simpan flag kelulusan verifikasi wajah di session laravel
                session(['wajah_terverifikasi_' . $ujian_id => true]);

                return response()->json(['status' => 'success', 'distance' => $distance]);
            }

            return response()->json([
                'status' => 'failed', 
                'message' => 'Wajah tidak cocok dengan data terdaftar.',
                'distance' => $distance
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Eror Server: ' . $e->getMessage()
            ], 500);
        }
    }
}