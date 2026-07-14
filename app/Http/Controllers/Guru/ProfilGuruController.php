<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfilGuru;

class ProfilGuruController extends Controller
{
    // tampil halaman profil
    public function index()
    {
        $profil = ProfilGuru::first(); // ambil 1 data (sementara)

        return view('guru.profil-guru', compact('profil'));
    }

    // update data profil
    public function update(Request $request)
    {
        $profil = ProfilGuru::first();

        if(!$profil){
            $profil = ProfilGuru::create($request->all());
        }else{
            $profil->update($request->all());
        }

        return back()->with('success','Profil berhasil diupdate');
    }
}