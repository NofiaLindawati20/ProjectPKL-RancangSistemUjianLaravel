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
        Schema::create('nilai_ujians', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel users (untuk id siswa)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Menghubungkan ke tabel ujians
            $table->foreignId('ujian_id')->constrained('ujians')->onDelete('cascade');
            
            // Menyimpan skor/nilai hasil ujian siswa
            $table->integer('nilai')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_ujians');
    }
};
