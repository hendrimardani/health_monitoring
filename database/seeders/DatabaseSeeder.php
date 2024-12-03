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

        VitalSign::create([
            'id_pemeriksaan' => 1,
            'saturasi_oksigen' => '60.0',
            'detak_jantung' => '120',
            'suhu_badan' => '38.0',
            'berat_badan' => '160 cm',
            'tekanan_darah_sistol' => '120 mg',
            'tekanan_darah_diastol' => '70 mg',
            'waktu_pengukuran' => '2024-08-19'
        ]);

        Pemeriksaan::create([
            'id_pasien' => 1,
            'id_diagnosa' => 1,
            'keluhan' => 'Sakit kepala dan nyeri otot',
            'catatan' => 'Perbanyak minum air putih dan istirahat yang cukup',
            'waktu_pemeriksaan' => '2024-10-08'
        ]);

        // Obat::create([
        //     'nama_obat' => 'Paracetamol',
        //     'kategori' => 'tablet',
        //     'dosis_tersedia' => '50mg',
        //     'unit' => '5'
        // ]);

        // Diagnosa::create([
        //     'kode_icd' => 'A001',
        //     'deskripsi' => 'Penyakit yang disebabkan oleh virus Dengue yang ditularkan melalui gigitan nyamuk Aedes aegypti. Gejalanya meliputi demam tinggi, sakit kepala, nyeri sendi, dan ruam kulit.',
        //     'rekomendasi' => 'meningkatkan asupan cairan dengan banyak minum air putih atau cairan elektrolit, mengonsumsi makanan bergizi, dan memantau suhu tubuh secara rutin.'
        // ]);

        // VitalSign::create([
        //     'tekanan_darah_distol' => 50.0,
        //     'tekanan_Darah_diastol' => 50.0,
        //     'suhu_badan' => 36.5,
        //     'detak_jantung' => 60,
        //     'saturasi_oksigen' => 95,
        //     'berat_badan' => 65.5,
        //     'waktu_pengukuran' => '2024-10-29'
        // ]);

        // Dokter::create([
        //     'nama_dokter' => 'Dr. Chelsea Island',
        //     'no_telepon' => '081392889192',
        //     'spesialisasi' => 'Bedah (Surgeon)'
        // ]);

        // Dokter::create([
        //     'nama_dokter' => 'Dr. Mia Parker',
        //     'no_telepon' => '089289289994',
        //     'spesialisasi' => 'Saraf (Neurolog)'
        // ]);

        // Dokter::create([
        //     'nama_dokter' => 'Dr. Amanda Davis',
        //     'no_telepon' => '082988199281',
        //     'spesialisasi' => 'Jantung dan Pembuluh Darah (Kardiolog)'
        // ]);

        // Dokter::create([
        //     'nama_dokter' => 'Dr. Benjamin Reed',
        //     'no_telepon' => '082729991282',
        //     'spesialisasi' => 'Saraf (Neurolog)'
        // ]);

        // Dokter::create([
        //     'nama_dokter' => 'Dr. Emily Smith',
        //     'no_telepon' => '0858827771990',
        //     'spesialisasi' => 'Paru (Pulmonolog)'
        // ]); 

        
        // Dokter::create([
        //     'nama_dokter' => 'Dr. Alexander King',
        //     'no_telepon' => '0819928123495',
        //     'spesialisasi' => 'Saraf (Neurolog)'
        // ]); 

        
        // Dokter::create([
        //     'nama_dokter' => 'Dr. Natalie Anderson',
        //     'no_telepon' => '0858827771990',
        //     'spesialisasi' => 'Bedah (Surgeon)'
        // ]); 

        // Dokter::create([
        //     'nama_dokter' => 'Dr. John Wilson',
        //     'no_telepon' => '0827490003881',
        //     'spesialisasi' => 'Penyakit Dalam (Internist)'
        // ]);
        
        // Dokter::create([
        //     'nama_dokter' => 'Dr. Anthony Hill',
        //     'no_telepon' => '0892799991212',
        //     'spesialisasi' => 'Jantung dan Pembuluh Darah (Kardiolog)'
        // ]); 

        // Dokter::create([
        //     'nama_dokter' => 'Dr. Emma Williams',
        //     'no_telepon' => '0887299918772',
        //     'spesialisasi' => 'Paru (Pulmonolog)'
        // ]); 

        // Dokter::create([
        //     'nama_dokter' => 'Dr. Liam Foste',
        //     'no_telepon' => '0887299918772',
        //     'spesialisasi' => 'Penyakit Dalam (Internist)'
        // ]);

        // Pemeriksaan::create([
        //     'id_dokter' => 1,
        //     'id_pasien' => 1,
        //     'waktu_pemeriksaan' => '2024-08-19',
        //     'keluhan' => 'Nyeri otot',
        //     'catatan' => 'onsumsi makanan kaya protein untuk mendukung perbaikan otot, seperti daging, ikan, telur, kacang-kacangan, dan produk susu.Pastikan asupan elektrolit (seperti magnesium, kalium, dan kalsium) yang cukup untuk mendukung fungsi otot.'
        // ]);
    }
}
