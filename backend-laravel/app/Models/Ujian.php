<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Soal;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\User;
use App\Models\NilaiUjian;

class Ujian extends Model
{
    use HasFactory;
    protected $table = 'ujians';
    
    protected $fillable = [
        'nama_ujian',
        'mapel',
        'kelas',
        'guru_id',
        'durasi',
        'tanggal_ujian',
        'acak_jawaban',
        'acak_soal'
    ];

    // ================= RELASI =================

    // Ujian -> Mapel
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

    // Ujian -> Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // Ujian -> Guru (User dengan role guru)
    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    // Ujian -> Soal
    public function soals()
    {
        return $this->hasMany(Soal::class, 'ujian_id');
    }

    // Ujian -> Nilai
    public function nilai()
    {
        return $this->hasMany(NilaiUjian::class, 'ujian_id');
    }
}