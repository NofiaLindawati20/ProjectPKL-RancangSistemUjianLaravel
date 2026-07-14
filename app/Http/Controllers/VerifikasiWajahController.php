<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WajahSiswa;

class VerifikasiWajahController extends Controller
{
    public function verify(Request $request, $id)
    {
        // 🧠 ambil descriptor dengan aman
        $inputDescriptor = $request->input('descriptor');

        if (!$inputDescriptor || !is_array($inputDescriptor)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Descriptor tidak valid'
            ]);
        }

        // 🔍 ambil wajah sesuai mahasiswa
        $faces = WajahMahasiswa::where('mahasiswa_id', $id)->get();

        if ($faces->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Data wajah tidak ditemukan'
            ]);
        }

        $threshold = 0.5;

        foreach ($faces as $face) {

            $stored = json_decode($face->descriptor, true);

            // 🧨 validasi JSON rusak
            if (!$stored || !is_array($stored)) {
                continue;
            }

            // 🧨 samakan panjang array (anti error mismatch)
            if (count($inputDescriptor) !== count($stored)) {
                continue;
            }

            $distance = $this->euclideanDistance($inputDescriptor, $stored);

            if ($distance < $threshold) {
                return response()->json([
                    'status' => 'success',
                    'mahasiswa_id' => $id,
                    'distance' => round($distance, 4)
                ]);
            }
        }

        return response()->json([
            'status' => 'failed',
            'message' => 'Wajah tidak cocok'
        ]);
    }

    private function euclideanDistance($a, $b)
    {
        $sum = 0;

        $length = min(count($a), count($b));

        for ($i = 0; $i < $length; $i++) {
            $diff = (float)$a[$i] - (float)$b[$i];
            $sum += $diff * $diff;
        }

        return sqrt($sum);
    }
}