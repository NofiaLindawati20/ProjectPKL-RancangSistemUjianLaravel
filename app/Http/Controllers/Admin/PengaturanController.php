<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PengaturanController extends Controller
{
    // tampil halaman pengaturan
    public function index()
    {
        $user = auth()->user();

        return view('admin.pengaturan', compact('user'));
    }

    // update profil
    public function update(Request $request)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return back()->with('success','Profil berhasil diupdate');
    }

    // update password
    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success','Password berhasil diubah');
    }
}