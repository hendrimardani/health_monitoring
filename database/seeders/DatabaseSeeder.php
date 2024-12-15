<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Dokter;
use App\Models\Diagnosa;
use App\Models\VitalSign;
use App\Models\Obat;
use App\Models\Farmasi;
use App\Models\Resep;
use App\Models\Pasien;
use App\Models\RiwayatPenyakit;
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

        User::create([
            'nama' => 'Doddy Saputra',
            'email' => 'doddysaputra@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'nama' => 'Dr.Johan Marohan',
            'email' => 'johanmarohan@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'dokter',
        ]);

        User::create([
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
        ]);

        VitalSign::create([
            'saturasi_oksigen' => '70.5',
            'detak_jantung' => '120',
            'suhu_badan' => '37.5',
            'berat_badan' => '160',
            'tekanan_darah_sistol' => '70',
            'tekanan_darah_diastol' => '110',
            'waktu_pengukuran' => now()
        ]);

        Farmasi::create([
            'nama_perusahaan' => 'PT Global Indonesia',
            'alamat_perusahaan' => 'Jalan Cijawura Girang'
        ]);

        Farmasi::create([
            'nama_perusahaan' => 'PT Denso Indonesia',
            'alamat_perusahaan' => 'Jalan Perintis Kemerdekaan No. 21'
        ]);

        Farmasi::create([
            'nama_perusahaan' => 'PT Dicoding Indonesia',
            'alamat_perusahaan' => 'Jalan Buah Batu no, 102'
        ]);

        Obat::create([
            'id_obat' => 1,
            'nama_obat' => 'paracetamol',
            'kategori' => 'tablet',
            'dosis_tersedia' => '300 mg',
            'unit' => '5'
        ]);

        Obat::create([
            'id_obat' => 1,
            'nama_obat' => 'paracetamol',
            'kategori' => 'tablet',
            'dosis_tersedia' => '200 mg',
            'unit' => '15'
        ]);

        Obat::create([
            'id_obat' => 1,
            'nama_obat' => 'paracetamol',
            'kategori' => 'cair',
            'dosis_tersedia' => '100 mg',
            'unit' => '10'
        ]);

        Obat::create([
            'id_obat' => 1,
            'nama_obat' => 'paracetamol',
            'kategori' => 'cair',
            'dosis_tersedia' => '200 mg',
            'unit' => '15'
        ]);

        Obat::create([
            'id_obat' => 2,
            'nama_obat' => 'antibiotik',
            'kategori' => 'kapsul',
            'dosis_tersedia' => '100 mg',
            'unit' => '5'
        ]);

        Obat::create([
            'id_obat' => 2,
            'nama_obat' => 'antibiotik',
            'kategori' => 'kapsul',
            'dosis_tersedia' => '200 mg',
            'unit' => '15'
        ]);

        Obat::create([
            'id_obat' => 2,
            'nama_obat' => 'antibiotik',
            'kategori' => 'tablet',
            'dosis_tersedia' => '100 mg',
            'unit' => '35'
        ]);

        Obat::create([
            'id_obat' => 2,
            'nama_obat' => 'antibiotik',
            'kategori' => 'tablet',
            'dosis_tersedia' => '200 mg',
            'unit' => '5'
        ]);

        Obat::create([
            'id_obat' => 2,
            'nama_obat' => 'antibiotik',
            'kategori' => 'cair',
            'dosis_tersedia' => '100 mg',
            'unit' => '25'
        ]);

        Obat::create([
            'id_obat' => 2,
            'nama_obat' => 'antibiotik',
            'kategori' => 'cair',
            'dosis_tersedia' => '200 mg',
            'unit' => '5'
        ]);

        Obat::create([
            'id_obat' => 3,
            'nama_obat' => 'Obat Lambung',
            'kategori' => 'tablet',
            'dosis_tersedia' => '100 mg',
            'unit' => '45'
        ]);

        Obat::create([
            'id_obat' => 3,
            'nama_obat' => 'Obat Lambung',
            'kategori' => 'tablet',
            'dosis_tersedia' => '200 mg',
            'unit' => '15'
        ]);

        Obat::create([
            'id_obat' => 3,
            'nama_obat' => 'Obat Lambung',
            'kategori' => 'cair',
            'dosis_tersedia' => '200 mg',
            'unit' => '15'
        ]);

        Obat::create([
            'id_obat' => 3,
            'nama_obat' => 'Obat Lambung',
            'kategori' => 'cair',
            'dosis_tersedia' => '200 mg',
            'unit' => '15'
        ]);
        
        Dokter::create([
            'id_dokter' => 2,
            'nama_dokter' => 'Dr. Johan Marohan',
            'no_telepon_dokter' => '082499030928',
            'spesialisasi' => 'Penyakit Dalam (Internist)'
        ]);

        Resep::create([
            'id_obat' => 1,
            'id_dokter' => 2,
            'frekuensi' => 'Setelah makan',
            'cara_penggunaan' => 'ditelan dengan air setelah makan',
            'durasi_hari' => 2
        ]);

        Resep::create([
            'id_obat' => 1,
            'id_dokter' => 2,
            'frekuensi' => 'Setelah makan',
            'cara_penggunaan' => 'ditelan dengan air setelah makan',
            'durasi_hari' => 3
        ]);

        Resep::create([
            'id_obat' => 1,
            'id_dokter' => 2,
            'frekuensi' => 'Sebelum makan',
            'cara_penggunaan' => 'ditelan dengan air sebelum makan',
            'durasi_hari' => 4
        ]);

        Resep::create([
            'id_obat' => 2,
            'id_dokter' => 2,
            'frekuensi' => 'Setelah makan',
            'cara_penggunaan' => 'ditelan dengan air setelah makan',
            'durasi_hari' => 2
        ]);

        Resep::create([
            'id_obat' => 2,
            'id_dokter' => 2,
            'frekuensi' => 'Sebelum makan',
            'cara_penggunaan' => 'ditelan dengan air setelah makan',
            'durasi_hari' => 3
        ]);

        Pasien::create([
            'id_pasien' => 1,
            'nama' => 'Erik Mardani',
            'nik' => '3290182948291',
            'no_telepon' => '08290291028192',
            'usia' => '20',
            'jenis_kelamin' => 'laki-laki',
            'alamat' => 'Jalan Cagak',
            'status' => 'menunggu'
        ]);

        Pasien::create([
            'id_pasien' => 2,
            'nama' => 'Doddy Saputra',
            'nik' => '32780601902910298',
            'no_telepon' => '088292819228',
            'usia' => '40',
            'jenis_kelamin' => 'laki-laki',
            'alamat' => 'Jalan Gunung Putri',
            'status' => 'menunggu'
        ]);

        RiwayatPenyakit::create([
            'pasien_id_pasien' => 1,
            'keluhan' => 'Sakit kepala',
        ]);

        
        RiwayatPenyakit::create([
            'pasien_id_pasien' => 2,
            'keluhan' => 'Demam',
        ]);

        Diagnosa::create([
            'id_dokter' => 2,
            'kode_icd' => 'A001',
            'deskripsi' => 'Kondisi tekanan darah pasien lebih tinggi dari normal dengan tekanan sistolik > 140 mmHg dan diastolik > 90 mmHg. Gejala meliputi sakit kepala, pusing, dan kelelahan',
            'rekomendasi' => 'Pasien disarankan untuk mengurangi konsumsi garam, melakukan aktivitas fisik ringan secara rutin, dan memonitor tekanan darah setiap hari. Jika tekanan darah terus meningkat, segera konsultasi ke dokter spesialis.'
        ]);
        
    }
}
