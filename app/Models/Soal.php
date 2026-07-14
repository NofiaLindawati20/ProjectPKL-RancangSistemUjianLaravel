<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $fillable = [
        'ujian_id',
        'pertanyaan',
        'gambar_soal',
        'tipe',
        'a',
        'b',
        'c',
        'd',
        'e',
        'gambar_a',
        'gambar_b',
        'gambar_c',
        'gambar_d',
        'gambar_e',
        'jawaban_benar',
        'poin'
        ];

    public function ujian()
    {
        return $this->belongsTo(Ujian::class, 'ujian_id', 'id');
    }

    // Relasi: Satu soal memiliki banyak pilihan jawaban (A-E)
    public function pilihans()
    {
        return $this->hasMany(PilihanJawaban::class, 'soal_id');
    }
}