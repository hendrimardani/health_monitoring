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
            'nama_pasien' => 'Andi Junardi',
            'email_pasien' => 'andijunardi@gmail.com',
            'password' => bcrypt('12345'),
            'nik' => '3278062903010007',
            'alamat' => '082499030928',
            'no_telepon' => '089100889200',
            'riwayat_penyakit' => 'Sesak Nafas',
            'jenis_kelamin' => 'laki-laki',
            'tanggal_lahir' => '2001-03-29'
        ]);

        Dokter::create([
            'nama_dokter' => 'Dr. Johan Marohan',
            'no_telepon' => '082499030928',
            'spesialisasi' => 'Penyakit Dalam (Internist)'
        ]);

        Dokter::create([
            'nama_dokter' => 'Dr. Chelsea Island',
            'no_telepon' => '081392889192',
            'spesialisasi' => 'Bedah (Surgeon)'
        ]);

        Dokter::create([
            'nama_dokter' => 'Dr. Mia Parker',
            'no_telepon' => '089289289994',
            'spesialisasi' => 'Saraf (Neurolog)'
        ]);

        Dokter::create([
            'nama_dokter' => 'Dr. Amanda Davis',
            'no_telepon' => '082988199281',
            'spesialisasi' => 'Jantung dan Pembuluh Darah (Kardiolog)'
        ]);

        Dokter::create([
            'nama_dokter' => 'Dr. Benjamin Reed',
            'no_telepon' => '082729991282',
            'spesialisasi' => 'Saraf (Neurolog)'
        ]);

        Dokter::create([
            'nama_dokter' => 'Dr. Emily Smith',
            'no_telepon' => '0858827771990',
            'spesialisasi' => 'Paru (Pulmonolog)'
        ]); 

        
        Dokter::create([
            'nama_dokter' => 'Dr. Alexander King',
            'no_telepon' => '0819928123495',
            'spesialisasi' => 'Saraf (Neurolog)'
        ]); 

        
        Dokter::create([
            'nama_dokter' => 'Dr. Natalie Anderson',
            'no_telepon' => '0858827771990',
            'spesialisasi' => 'Bedah (Surgeon)'
        ]); 

        Dokter::create([
            'nama_dokter' => 'Dr. John Wilson',
            'no_telepon' => '0827490003881',
            'spesialisasi' => 'Penyakit Dalam (Internist)'
        ]);
        
        Dokter::create([
            'nama_dokter' => 'Dr. Anthony Hill',
            'no_telepon' => '0892799991212',
            'spesialisasi' => 'Jantung dan Pembuluh Darah (Kardiolog)'
        ]); 

        Dokter::create([
            'nama_dokter' => 'Dr. Emma Williams',
            'no_telepon' => '0887299918772',
            'spesialisasi' => 'Paru (Pulmonolog)'
        ]); 

        Dokter::create([
            'nama_dokter' => 'Dr. Liam Foste',
            'no_telepon' => '0887299918772',
            'spesialisasi' => 'Penyakit Dalam (Internist)'
        ]); 
    }
}
