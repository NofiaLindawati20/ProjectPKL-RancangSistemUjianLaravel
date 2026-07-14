<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcara extends Model
{
    use HasFactory;

    protected $table = 'berita_acaras';

    protected $fillable = [
        'pengawas_id',
        'ujian_id',
        'jumlah_peserta_hadir',
        'jumlah_peserta_absen',
        'catatan_kejadian',
        'status_pelaksanaan',
    ];

    // Relasi ke model Ujian untuk tahu ujian apa yang diawasi
    public function ujian()
    {
        return $this->belongsTo(Ujian::class, 'ujian_id', 'id');
    }

    // Relasi ke model User untuk tahu siapa pengawasnya
    public function pengawas()
    {
        return $this->belongsTo(User::class, 'pengawas_id', 'id');
    }
}