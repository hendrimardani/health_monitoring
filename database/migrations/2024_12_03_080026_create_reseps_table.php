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
        Schema::create('reseps', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('id_obat');
            $table->unsignedBigInteger('id_dokter');
            $table->string('frekuensi');
            $table->string('durasi_hari');
            $table->string('cara_penggunaan');
            $table->timestamps();

            // pada references('id_obat') adalah primary key dari entitas obats
            $table->foreign('id_obat')->references('id_obat')->on('obats')->onDelete('cascade');
            // pada references('id_dokter') adalah primary key dari entitas dokters
            $table->foreign('id_dokter')->references('id_dokter')->on('dokters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reseps');
    }
};
