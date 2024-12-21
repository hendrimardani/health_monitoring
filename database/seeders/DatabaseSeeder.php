<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Dokter;
use App\Models\Diagnosa;
use App\Models\VitalSign;
use App\Models\Obat;
use App\Models\Farmasi;
use App\Models\KategoriObat;
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
            'nama' => 'Dr. Johan Marohan',
            'email' => 'dr.johanmarohan@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'dokter',
        ]);

        User::create([
            'nama' => 'Doddy Saputra',
            'email' => 'doddysaputra@gmail.com',
            'password' => bcrypt('12345678')
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

        KategoriObat::create([
            'nama_kategori' => 'tablet',
            'deskripsi' => 'Obat untuk menurunkan demam'
        ]);

        KategoriObat::create([
            'nama_kategori' => 'kapsul',
            'deskripsi' => 'Obat untuk mengobati infeksi yang disebabkan oleh bakteri'
        ]);

        KategoriObat::create([
            'nama_kategori' => 'cair',
            'deskripsi' => 'Obat untuk mengatasi masalah atau gangguan pada sistem pencernaan, terutama yang berkaitan dengan lambung. Seperti maag atau asam lambung tinggi'
        ]);

        Obat::create([
            'farmasi_id' => 1,
            'kategori_id' => 1,
            'nama_obat' => 'paracetamol',
            'dosis_tersedia' => '100 mg',
            'unit' => '5'
        ]);

        Obat::create([
            'farmasi_id' => 1,
            'kategori_id' => 1,
            'nama_obat' => 'paracetamol',
            'dosis_tersedia' => '200 mg',
            'unit' => '15'
        ]);

        Obat::create([
            'farmasi_id' => 1,
            'kategori_id' => 2,
            'nama_obat' => 'paracetamol',
            'dosis_tersedia' => '100 mg',
            'unit' => '10'
        ]);

        Obat::create([
            'farmasi_id' => 1,
            'kategori_id' => 2,
            'nama_obat' => 'paracetamol',
            'dosis_tersedia' => '200 mg',
            'unit' => '15'
        ]);

        Obat::create([
            'farmasi_id' => 1,
            'kategori_id' => 3,
            'nama_obat' => 'paracetamol',
            'dosis_tersedia' => '100 mg',
            'unit' => '10'
        ]);

        Obat::create([
            'farmasi_id' => 1,
            'kategori_id' => 3,
            'nama_obat' => 'paracetamol',
            'dosis_tersedia' => '200 mg',
            'unit' => '15'
        ]);

        Obat::create([
            'farmasi_id' => 2,
            'kategori_id' => 1,
            'nama_obat' => 'antibiotik',
            'dosis_tersedia' => '100 mg',
            'unit' => '5'
        ]);

        Obat::create([
            'farmasi_id' => 2,
            'kategori_id' => 1,
            'nama_obat' => 'antibiotik',
            'dosis_tersedia' => '200 mg',
            'unit' => '15'
        ]);

        Obat::create([
            'farmasi_id' => 2,
            'kategori_id' => 2,
            'nama_obat' => 'antibiotik',
            'dosis_tersedia' => '100 mg',
            'unit' => '5'
        ]);

        Obat::create([
            'farmasi_id' => 2,
            'kategori_id' => 2,
            'nama_obat' => 'antibiotik',
            'dosis_tersedia' => '200 mg',
            'unit' => '35'
        ]);

        Obat::create([
            'farmasi_id' => 2,
            'kategori_id' => 3,
            'nama_obat' => 'antibiotik',
            'dosis_tersedia' => '100 mg',
            'unit' => '25'
        ]);

        Obat::create([
            'farmasi_id' => 2,
            'kategori_id' => 3,
            'nama_obat' => 'antibiotik',
            'dosis_tersedia' => '200 mg',
            'unit' => '5'
        ]);

        Obat::create([
            'farmasi_id' => 3,
            'kategori_id' => 1,
            'nama_obat' => 'obat lambung',
            'dosis_tersedia' => '100 mg',
            'unit' => '45'
        ]);

        Obat::create([
            'farmasi_id' => 3,
            'kategori_id' => 1,
            'nama_obat' => 'obat lambung',
            'dosis_tersedia' => '200 mg',
            'unit' => '15'
        ]);

        Obat::create([
            'farmasi_id' => 3,
            'kategori_id' => 2,
            'nama_obat' => 'obat lambung',
            'dosis_tersedia' => '100 mg',
            'unit' => '15'
        ]);

        Obat::create([
            'farmasi_id' => 3,
            'kategori_id' => 2,
            'nama_obat' => 'obat lambung',
            'dosis_tersedia' => '200 mg',
            'unit' => '15'
        ]);

        Obat::create([
            'farmasi_id' => 3,
            'kategori_id' => 3,
            'nama_obat' => 'obat lambung',
            'dosis_tersedia' => '100 mg',
            'unit' => '15'
        ]);

        Obat::create([
            'farmasi_id' => 3,
            'kategori_id' => 3,
            'nama_obat' => 'obat lambung',
            'dosis_tersedia' => '200 mg',
            'unit' => '35'
        ]);
        
        Dokter::create([
            'id_dokter' => 2,
            'nama_dokter' => 'Dr. Johan Marohan',
            'no_telepon_dokter' => '082499030928',
            'spesialisasi' => 'Penyakit Dalam (Internist)'
        ]);

        Resep::create([
            'obat_id' => 1,
            'dokter_id' => 2,
            'frekuensi' => 'setelah makan',
            'cara_penggunaan' => 'ditelan dengan air setelah makan',
            'durasi_hari' => 2
        ]);

        Resep::create([
            'obat_id' => 1,
            'dokter_id' => 2,
            'frekuensi' => 'setelah makan',
            'cara_penggunaan' => 'ditelan dengan air setelah makan',
            'durasi_hari' => 3
        ]);

        Resep::create([
            'obat_id' => 1,
            'dokter_id' => 2,
            'frekuensi' => 'sebelum makan',
            'cara_penggunaan' => 'ditelan dengan air sebelum makan',
            'durasi_hari' => 4
        ]);

        Resep::create([
            'obat_id' => 2,
            'dokter_id' => 2,
            'frekuensi' => 'setelah makan',
            'cara_penggunaan' => 'ditelan dengan air setelah makan',
            'durasi_hari' => 2
        ]);

        Resep::create([
            'obat_id' => 2,
            'dokter_id' => 2,
            'frekuensi' => 'sebelum makan',
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
        ]);

        Pasien::create([
            'id_pasien' => 3,
            'nama' => 'Doddy Saputra',
            'nik' => '32780601902910298',
            'no_telepon' => '088292819228',
            'usia' => '40',
            'jenis_kelamin' => 'laki-laki',
            'alamat' => 'Jalan Gunung Putri',
        ]);

        RiwayatPenyakit::create([
            'pasien_id' => 1,
            'keluhan' => 'Sakit kepala',
            'status' => 'menunggu'
        ]);

        
        RiwayatPenyakit::create([
            'pasien_id' => 3,
            'keluhan' => 'Demam',
            'status' => 'menunggu'
        ]);

        Diagnosa::create([
            'dokter_id' => 2,
            'kode_icd' => 'A001',
            'deskripsi' => 'Kondisi tekanan darah pasien lebih tinggi dari normal dengan tekanan sistolik > 140 mmHg dan diastolik > 90 mmHg. Gejala meliputi sakit kepala, pusing, dan kelelahan',
            'rekomendasi' => 'Pasien disarankan untuk mengurangi konsumsi garam, melakukan aktivitas fisik ringan secara rutin, dan memonitor tekanan darah setiap hari. Jika tekanan darah terus meningkat, segera konsultasi ke dokter spesialis.'
        ]);
        
    }
}
