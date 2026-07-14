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
    Schema::create('berita_acaras', function (Blueprint $table) {
        $table->id();
        // Menghubungkan ke user dengan role pengawas
        $table->foreignId('pengawas_id')->constrained('users')->onDelete('cascade');
        // Menghubungkan ke ujian yang diawasi
        $table->foreignId('ujian_id')->constrained('ujians')->onDelete('cascade');
        
        // Informasi Berita Acara
        $table->integer('jumlah_peserta_hadir');
        $table->integer('jumlah_peserta_absen');
        $table->text('catatan_kejadian')->nullable(); // Catatan jika ada kecurangan/kendala
        $table->string('status_pelaksanaan')->default('Selesai'); // Selesai, Berjalan, Tertunda
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_acaras');
    }
};
