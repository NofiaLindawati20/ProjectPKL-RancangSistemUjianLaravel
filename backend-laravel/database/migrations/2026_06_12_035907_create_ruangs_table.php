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
        Schema::create('ruangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ruang');
            $table->string('kode_ruang');
            $table->string('ujian');
            $table->string('kelas');
            $table->integer('kapasitas');
            $table->integer('jumlah_peserta')->default(0);
            $table->string('token')->nullable();
            $table->enum('status',['aktif','siap','selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangs');
    }
};
