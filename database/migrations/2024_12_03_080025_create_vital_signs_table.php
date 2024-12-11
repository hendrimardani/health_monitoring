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
        Schema::create('vital_signs', function (Blueprint $table) {
            $table->id();
            $table->string('saturasi_oksigen');
            $table->string('detak_jantung');
            $table->string('suhu_badan');
            $table->string('berat_badan');
            $table->string('tekanan_darah_sistol');
            $table->string('tekanan_darah_diastol');
            $table->timestamp('waktu_pengukuran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vital_signs');
    }
};
