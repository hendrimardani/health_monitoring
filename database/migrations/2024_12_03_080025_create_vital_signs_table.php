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
            $table->integer('saturasi_oksigen');
            $table->integer('detak_jantung');
            $table->float('suhu_badan', 5, 2); // 5 total digit, 2 desimal
            $table->float('berat_badan', 5, 2); // 5 total digit, 2 desimal
            $table->integer('tekanan_darah_sistol');
            $table->integer('tekanan_darah_diastol');
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
