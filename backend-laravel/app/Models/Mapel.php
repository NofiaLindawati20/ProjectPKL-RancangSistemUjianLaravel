<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

        protected $table = 'mapel';

        protected $fillable = [
            'kode',
            'nama_mapel',
            'kategori',
            'guru_pengampu'
        ];

        public function guru()
        {
            return $this->belongsToMany(User::class, 'guru_mapel', 'mapel_id', 'guru_id');
        }
    }