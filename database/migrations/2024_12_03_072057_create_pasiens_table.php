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
            $table->unsignedBigInteger('id_pasien')->primary(); // Foreign key diubah menjadi primary key
            $table->string('nama');
            $table->string('nik')->nullable()->unique();
            $table->string('no_telepon')->nullable();
            $table->integer('usia')->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->string('alamat', 500)->nullable();
            $table->timestamps();
            
            // Relasi tabel
            $table->foreign('id_pasien')->references('id')->on('users')->onDelete('cascade');
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
