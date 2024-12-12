<?php

namespace Database\Seeders;

use App\Models\Diagnosa;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Pemeriksaan;
use App\Models\VitalSign;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class pivotable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id_pemeriksaan = Pemeriksaan::firstOrCreate(['id' => 1]);
        VitalSign::create([
            'id_pemeriksaan' => $id_pemeriksaan->id,  // Menggunakan id pemeriksaan yang sudah ditemukan
            'saturasi_oksigen' => '60.0',
            'detak_jantung' => '120',
            'suhu_badan' => '38.0',
            'berat_badan' => '160 cm',
            'tekanan_darah_sistol' => '120 mg',
            'tekanan_darah_diastol' => '70 mg',
            'waktu_pengukuran' => '2024-08-19'
        ]);

        $id_pasien = Pasien::firstOrCreate(['id' => 1]);
        $id_diagnosa = Diagnosa::firstOrCreate(['id' => 1]);
        $id_dokter = Dokter::firstOrCreate(['id' => 1]);
        Pemeriksaan::create([
            'id_pasien' => $id_pasien->id,
            'id_diagnosa' => $id_diagnosa->id,
            'id_dokter' => $id_dokter->id,
            'keluhan' => 'Sakit kepala dan nyeri otot',
            'catatan' => 'Perbanyak minum air putih dan istirahat yang cukup',
            'waktu_pemeriksaan' => '2024-10-08'
        ]);
    }
}
