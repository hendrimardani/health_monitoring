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
        Schema::create('obats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farmasi_id');
            $table->unsignedBigInteger('kategori_id');
            $table->string('nama_obat');
            $table->integer('dosis_tersedia');
            $table->integer('unit');
            $table->timestamps();

            // Relasi tabel
            $table->foreign('farmasi_id')->references('id')->on('farmasis')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategori_obats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
