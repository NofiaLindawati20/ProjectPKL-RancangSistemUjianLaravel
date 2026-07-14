<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ujian_id')->constrained('ujians')->onDelete('cascade');
            $table->text('pertanyaan');
            $table->string('gambar_soal')->nullable(); // 🌟 Tambahan untuk gambar soal
            $table->enum('tipe', ['pg', 'essay'])->default('pg');

            // Teks Pilihan Jawaban
            $table->text('a')->nullable();
            $table->text('b')->nullable();
            $table->text('c')->nullable();
            $table->text('d')->nullable();
            $table->text('e')->nullable();

            // 🌟 Tambahan untuk Gambar Pilihan Jawaban
            $table->string('gambar_a')->nullable();
            $table->string('gambar_b')->nullable();
            $table->string('gambar_c')->nullable();
            $table->string('gambar_d')->nullable();
            $table->string('gambar_e')->nullable();

            $table->string('jawaban_benar')->nullable(); // Menyimpan A, B, C, D, atau E
            $table->integer('poin')->default(5);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('soals');
    }
};