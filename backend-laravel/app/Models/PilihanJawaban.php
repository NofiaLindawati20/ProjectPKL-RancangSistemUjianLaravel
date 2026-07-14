<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilihanJawaban extends Model
{
    use HasFactory;

    protected $table = 'pilihan_jawaban';
    protected $fillable = ['soal_id', 'label_pilihan', 'teks_pilihan', 'is_kunci'];
}