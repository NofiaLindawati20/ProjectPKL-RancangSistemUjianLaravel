<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ujian;
use App\Models\Kelas;
use App\Models\Mapel;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUser = User::count();
        $totalGuru = User::where('role','guru')->count();
        $totalSiswa = User::where('role','siswa')->count();
        $totalAdmin = User::where('role', 'admin')->count();
        
        $totalUjian = Ujian::count();
        $total_kelas = Kelas::count();
        $total_mapel = Mapel::count();

        $ujian_terbaru = Ujian::with('mapel')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('admin.dashboard', compact(
            'totalUser',
            'totalGuru',
            'totalSiswa',
            'totalUjian',
            'total_kelas',
            'total_mapel',
            'ujian_terbaru' // 🔥 WAJIB ADA
        ));
    }
}