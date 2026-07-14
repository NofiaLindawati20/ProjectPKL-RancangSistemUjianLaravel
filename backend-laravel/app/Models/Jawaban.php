<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $fillable = [
        'siswa_id','ujian_id','soal_id','jawaban','is_benar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }
}