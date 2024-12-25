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
        Schema::create('diagnosas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dokter_id'); // Foreign Key
            $table->string('kode_icd');
            $table->string('deskripsi', 500);
            $table->string('rekomendasi', 500);
            $table->timestamps();
            
            // Relasi tabel
            $table->foreign('dokter_id')->references('id_dokter')->on('dokters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosas');
    }
};
