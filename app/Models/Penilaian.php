<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penilaian extends Model
{
    protected $table = 'penilaians';

    protected $fillable = [
        'siswa_id',
        'ujian_id',
        'nilai_pg',
        'nilai_essay',
        'nilai_akhir',
        'status_essay'
    ];

   // Relasi ke data Siswa (User) menggunakan foreign key 'siswa_id'
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }

    // Relasi ke data Paket Soal (Ujian)
    public function ujian(): BelongsTo
    {
        return $this->belongsTo(Ujian::class, 'ujian_id');
    }


}