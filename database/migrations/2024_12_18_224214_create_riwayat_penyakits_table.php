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
        Schema::create('riwayat_penyakits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id'); // Foreign key
            $table->unsignedBigInteger('pemeriksaan_id')->nullable(); // Foreign key
            $table->string('keluhan')->nullable();
            $table->enum('status', ['menunggu', 'selesai'])->default('menunggu');
            $table->timestamps();

            $table->foreign('pasien_id')->references('id_pasien')->on('pasiens')->onDelete('cascade');
            $table->foreign('pemeriksaan_id')->references('id')->on('pemeriksaans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_penyakits');
    }
};
