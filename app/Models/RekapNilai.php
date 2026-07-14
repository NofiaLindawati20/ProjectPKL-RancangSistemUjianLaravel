<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekapNilai extends Model
{
    protected $table = 'penilaians'; // ambil dari tabel penilaian

    protected $fillable = [
        'siswa_id',
        'ujian_id',
        'nilai_pg',
        'nilai_essay',
        'nilai_akhir'
    ];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }
}