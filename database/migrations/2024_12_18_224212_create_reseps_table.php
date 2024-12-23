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
            $table->id();
            $table->unsignedBigInteger('obat_id');
            $table->unsignedBigInteger('dokter_id');
            $table->string('frekuensi');
            $table->string('durasi_hari');
            $table->text('cara_penggunaan');
            $table->timestamps();

            // pada references('id_obat') adalah primary key dari entitas obats
            $table->foreign('obat_id')->references('id')->on('obats')->onDelete('cascade');
            // pada references('id_dokter') adalah primary key dari entitas dokters
            $table->foreign('dokter_id')->references('id_dokter')->on('dokters')->onDelete('cascade');
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
