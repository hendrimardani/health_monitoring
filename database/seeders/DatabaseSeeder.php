<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Dokter;
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Pasien::create([
            'nama' => 'Andi Junardi',
            'slug' => 'andi-junardi',
            'nik' => '3278062903010007',
            'alamat' => '082499030928',
            'no_telepon' => '089100889200',
            'riwayat_penyakit' => 'Sesak Nafas',
            'jenis_kelamin' => 'laki-laki',
            'tanggal_lahir' => '2001-03-29'
        ]);

        Dokter::create([
            'nama' => 'Dr. Johan Marohan',
            'slug' => 'dr-johan-marohan',
            'no_telepon' => '082499030928',
            'spesialisasi' => 'Penyakit Dalam (Internist)'
        ]);

        Dokter::create([
            'nama' => 'Dr. Chelsea Island',
            'slug' => 'dr-chelsea-island',
            'no_telepon' => '081392889192',
            'spesialisasi' => 'Bedah (Surgeon)'
        ]);

        Dokter::create([
            'nama' => 'Dr. Mia Parker',
            'slug' => 'dr-mia-parker',
            'no_telepon' => '089289289994',
            'spesialisasi' => 'Saraf (Neurolog)'
        ]);

        Dokter::create([
            'nama' => 'Dr. Amanda Davis',
            'slug' => 'dr-amanda-davis',
            'no_telepon' => '082988199281',
            'spesialisasi' => 'Jantung dan Pembuluh Darah (Kardiolog)'
        ]);

        Dokter::create([
            'nama' => 'Dr. Benjamin Reed',
            'slug' => 'dr-benjamin-reed',
            'no_telepon' => '082729991282',
            'spesialisasi' => 'Saraf (Neurolog)'
        ]);

        Dokter::create([
            'nama' => 'Dr. Emily Smith',
            'slug' => 'dr-emily-smith',
            'no_telepon' => '0858827771990',
            'spesialisasi' => 'Paru (Pulmonolog)'
        ]); 

        
        Dokter::create([
            'nama' => 'Dr. Alexander King',
            'slug' => 'dr-alexander-king',
            'no_telepon' => '0819928123495',
            'spesialisasi' => 'Saraf (Neurolog)'
        ]); 

        
        Dokter::create([
            'nama' => 'Dr. Natalie Anderson',
            'slug' => 'dr-natalie-anderson',
            'no_telepon' => '0858827771990',
            'spesialisasi' => 'Bedah (Surgeon)'
        ]); 

        Dokter::create([
            'nama' => 'Dr. John Wilson',
            'slug' => 'dr-john-wilson',
            'no_telepon' => '0827490003881',
            'spesialisasi' => 'Penyakit Dalam (Internist)'
        ]);
        
        Dokter::create([
            'nama' => 'Dr. Anthony Hill',
            'slug' => 'dr-anthony-hill',
            'no_telepon' => '0892799991212',
            'spesialisasi' => 'Jantung dan Pembuluh Darah (Kardiolog)'
        ]); 

        Dokter::create([
            'nama' => 'Dr. Emma Williams',
            'slug' => 'dr-emma-williams',
            'no_telepon' => '0887299918772',
            'spesialisasi' => 'Paru (Pulmonolog)'
        ]); 

        Dokter::create([
            'nama' => 'Dr. Liam Foste',
            'slug' => 'dr-liam-foste',
            'no_telepon' => '0887299918772',
            'spesialisasi' => 'Penyakit Dalam (Internist)'
        ]); 
    }
}
