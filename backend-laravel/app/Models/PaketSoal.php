<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketSoal extends Model
{
    use HasFactory;

    protected $table = 'paket_soal';
    protected $fillable = ['nama_ujian', 'mapel', 'kelas', 'durasi', 'tanggal_ujian', 'acak_jawaban', 'acak_soal'];

    // Relasi: Satu paket memiliki banyak soal
    public function soals()
    {
        return $this->hasMany(Soal::class, 'paket_soal_id')->orderBy('urutan', 'asc');
    }
}