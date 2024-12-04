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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user'); // Foreign key
            $table->string('nama_pasien');
            $table->string('nik');
            $table->string('no_telepon');
            $table->string('usia');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('alamat');
            $table->string('riwayat_penyakit');
            $table->timestamps();
            
            // Relasi tabel
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
