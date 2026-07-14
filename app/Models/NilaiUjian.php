<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiUjian extends Model
{
    use HasFactory;

    protected $table = 'nilai_ujians';

    protected $fillable = [
        'user_id',
        'ujian_id',
        'nilai',
    ];

    // Relasi kembali ke model Ujian
    public function ujian()
    {
        return $this->belongsTo(Ujian::class, 'ujian_id', 'id');
    }
}