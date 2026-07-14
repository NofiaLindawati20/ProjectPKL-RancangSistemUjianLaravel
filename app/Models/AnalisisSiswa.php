<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalisisSiswa extends Model
{
    protected $table = 'penilaians';

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