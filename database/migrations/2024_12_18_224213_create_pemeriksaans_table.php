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
            $table->unsignedBigInteger('pasien_id');
            $table->unsignedBigInteger('diagnosa_id');
            $table->unsignedBigInteger('vital_sign_id'); 
            $table->unsignedBigInteger('dokter_id');
            $table->unsignedBigInteger('resep_id');
            $table->string('catatan');
            $table->timestamp('waktu_pemeriksaan');
            $table->timestamps();
            
            // Relasi tabel
            $table->foreign('pasien_id')->references('id_pasien')->on('pasiens')->onDelete('cascade');
            $table->foreign('diagnosa_id')->references('id')->on('diagnosas')->onDelete('cascade');
            $table->foreign('vital_sign_id')->references('id')->on('vital_signs')->onDelete('cascade');
            // id_dokter pada metode references adalah id_dokter dari tabel dokters
            $table->foreign('dokter_id')->references('id_dokter')->on('dokters')->onDelete('cascade');
            $table->foreign('resep_id')->references('id')->on('reseps')->onDelete('cascade');
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
