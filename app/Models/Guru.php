<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    // Isikan nama tabel jika tidak menggunakan format jamak (plural) bawaan Laravel
    protected $table = 'gurus'; 

    protected $fillable = [
        'user_id', // Menghubungkan ke tabel users
        'nip',
        // kolom lainnya...
    ];

    // Relasi ke User (Auth)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}