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
            $table->unsignedBigInteger('id_obat'); // Primary key dari foreign key
            $table->string('nama_obat');
            $table->string('kategori');
            $table->string('dosis_tersedia');
            $table->string('unit');
            $table->timestamps();

            // Relasi tabel
            $table->foreign('id_obat')->references('id')->on('farmasis')->onDelete('cascade');
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
