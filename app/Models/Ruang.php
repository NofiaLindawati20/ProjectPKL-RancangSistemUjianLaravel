<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $fillable = [
            'nama_ruang',
            'kode_ruang',
            'ujian',
            'kelas',
            'kapasitas',
            'jumlah_peserta',
            'token',
            'status'
        ];
    }

