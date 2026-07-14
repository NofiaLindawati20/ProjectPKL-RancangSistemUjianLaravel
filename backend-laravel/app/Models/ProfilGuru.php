<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilGuru extends Model
{
    protected $fillable = [
        'nama',
        'nip',
        'email',
        'no_hp',
        'mapel',
        'kelas'
    ];
}