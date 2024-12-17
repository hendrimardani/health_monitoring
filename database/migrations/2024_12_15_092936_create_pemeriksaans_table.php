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
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pasien');
            $table->unsignedBigInteger('id_diagnosa');
            $table->unsignedBigInteger('id_vital_sign'); 
            $table->unsignedBigInteger('id_dokter');
            $table->unsignedBigInteger('id_riwayat_penyakit');
            $table->string('catatan');
            $table->timestamp('waktu_pemeriksaan');
            $table->timestamps();
            
            // Relasi tabel
            $table->foreign('id_pasien')->references('id_pasien')->on('pasiens')->onDelete('cascade');
            $table->foreign('id_diagnosa')->references('id')->on('diagnosas')->onDelete('cascade');
            $table->foreign('id_vital_sign')->references('id')->on('vital_signs')->onDelete('cascade');
            // id_dokter pada metode references adalah id_dokter dari tabel dokters
            $table->foreign('id_dokter')->references('id_dokter')->on('dokters')->onDelete('cascade');
            $table->foreign('id_riwayat_penyakit')->references('id')->on('riwayat_penyakits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaans');
    }
};
