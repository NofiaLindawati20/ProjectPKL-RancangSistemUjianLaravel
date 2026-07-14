<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ujians', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ujian'); // 🌟 Pastikan kolom ini ada!
            $table->string('mapel');      // 🌟 Pastikan kolom ini ada!
            $table->string('kelas');      // 🌟 Pastikan kolom ini ada!
            $table->integer('durasi');    // 🌟 Pastikan kolom ini ada!
            $table->date('tanggal_ujian');// 🌟 Pastikan kolom ini ada!
            $table->boolean('acak_jawaban')->default(0);
            $table->boolean('acak_soal')->default(0);
            $table->timestamps();
        
        });

        // 1. Tabel Paket Ujian
        Schema::create('paket_soal', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ujian'); // Contoh: Ulangan Harian
            $table->string('mapel');
            $table->string('kelas');
            $table->integer('durasi'); // Dalam menit
            $table->date('tanggal_ujian');
            $table->boolean('acak_jawaban')->default(true);
            $table->boolean('acak_soal')->default(true);
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ujians');
        Schema::dropIfExists('pilihan_jawaban');
        Schema::dropIfExists('soals');
        Schema::dropIfExists('paket_soal');
    }
};


