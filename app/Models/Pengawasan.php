<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengawasan extends Model
{
    protected $fillable = [
        'nama_siswa',
        'nomor_kursi',
        'ruang',
        'status',
        'waktu_curang'
    ];
}