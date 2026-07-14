<?php

namespace App\Http\Controllers\Pengawas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengawasan;
use Carbon\Carbon;



class LivePengawasanController extends Controller
{
    // tampil denah
    public function index($ruang)
    {
        $data = Pengawasan::where('ruang',$ruang)->get();

        return view('pengawas.live-pengawasan', compact('data','ruang'));
    }

    // trigger kecurangan
    public function curang($id)
    {
        $siswa = Pengawasan::findOrFail($id);

        $siswa->update([
            'status' => 'curang',
            'waktu_curang' => now()
        ]);

        return response()->json(['status'=>'ok']);
    }

    // auto reset setelah 10 detik
    public function resetStatus()
    {
        $data = Pengawasan::where('status','curang')->get();

        foreach($data as $s){
            if(Carbon::parse($s->waktu_curang)->diffInSeconds(now()) > 10){
                $s->update(['status'=>'normal']);
            }
        }

        return response()->json(['status'=>'updated']);
    }
}
