<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Jawaban;

class LaporanController extends Controller
{
    public function index()
    {
        $siswa = User::where('role','siswa')->get();

        $laporan = [];

        foreach($siswa as $s){

            $jawaban = Jawaban::where('siswa_id',$s->id)->get();

            $total = $jawaban->count();
            $benar = 0;

            foreach($jawaban as $j){
                if($j->jawaban == $j->soal->jawaban_benar){
                    $benar++;
                }
            }

            $nilai = $total > 0 ? ($benar/$total)*100 : 0;

            $laporan[] = [
                'nama' => $s->name,
                'total' => $total,
                'benar' => $benar,
                'nilai' => round($nilai,2)
            ];
        }

        return view('admin.laporan', compact('laporan'));
    }
}