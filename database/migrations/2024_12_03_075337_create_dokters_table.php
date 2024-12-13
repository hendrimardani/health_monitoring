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
            $table->unsignedBigInteger('id_dokter')->primary(); // Foreign key dijadikan primary key
            $table->string('nama_dokter');
            $table->string('no_telepon_dokter');
            $table->string('spesialisasi');
            $table->timestamps();
            
            // Relasi tabel
            $table->foreign('id_dokter')->references('id')->on('users')->onDelete('cascade');
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
