<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Dokter;
use App\Models\Diagnosa;
use App\Models\VitalSign;
use App\Models\Obat;
use App\Models\Farmasi;
use App\Models\Resep;
use App\Models\Pemeriksaan;
use App\Models\Pasien;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama' => 'Erik Mardani',
            'email' => 'erikmardani@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        Farmasi::create([
            'nama_perusahaan' => 'PT Global Indonesia',
            'alamat_perusahaan' => 'Jalan Cijawura Girang'
        ]);

        Obat::create([
            'id_perusahaan' => 1,
            'nama_obat' => 'paracetamol',
            'kategori' => 'tablet',
            'dosis_tersedia' => '500 mg',
            'unit' => '5'
        ]);

        Resep::create([
            'id_obat' => 1,
            'frekuensi' => 'Setelah makan',
            'cara_penggunaan' => 'ditelan dengan air setelah makan',
            'durasi_hari' => 2
        ]);

        Dokter::create([
            'id_resep' => 1,
            'nama_dokter' => 'Dr. Johan Marohan',
            'no_telepon' => '082499030928',
            'spesialisasi' => 'Penyakit Dalam (Internist)'
        ]);

        Pasien::create([
            'id_user' => 1,
            'nik' => '3290182948291',
            'no_telepon' => '08290291028192',
            'usia' => '20 tahun',
            'jenis_kelamin' => 'laki-laki',
            'alamat' => 'Jalan Cagak',
            'riwayat_penyakit' => 'Sakit kepala',
        ]);

        Diagnosa::create([
            'id_dokter' => 1,
            'kode_icd' => 'A001',
            'deskripsi' => 'Kondisi tekanan darah pasien lebih tinggi dari normal dengan tekanan sistolik > 140 mmHg dan diastolik > 90 mmHg. Gejala meliputi sakit kepala, pusing, dan kelelahan',
            'rekomendasi' => 'Pasien disarankan untuk mengurangi konsumsi garam, melakukan aktivitas fisik ringan secara rutin, dan memonitor tekanan darah setiap hari. Jika tekanan darah terus meningkat, segera konsultasi ke dokter spesialis.'
        ]);
        
    }
}
