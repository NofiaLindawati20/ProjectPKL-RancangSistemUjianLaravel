<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WajahSiswa extends Model
{
    use HasFactory;

    protected $table = 'wajah_siswa';

    protected $fillable = [
        'siswa_id',
        'descriptor'
    ];

    // 🔥 otomatis decode JSON saat diambil
    protected $casts = [
        'descriptor' => 'array',
    ];
}