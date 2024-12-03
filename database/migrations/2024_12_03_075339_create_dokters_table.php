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
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_resep'); // Foreign key
            $table->string('nama_dokter');
            $table->string('no_telepon');
            $table->string('spesialisasi');
            $table->timestamps();
            
            // Relasi tabel
            $table->foreign('id_resep')->references('id')->on('reseps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};
