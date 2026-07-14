<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'wali_kelas',
        'jumlah_siswa'
    ];

    // RELASI KE SISWA
    public function siswa()
    {
        return $this->hasMany(User::class, 'kelas_id');
    }
}