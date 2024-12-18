<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $guarded = ['id_pasien'];

    // Tentukan primary key untuk model ini
    protected $primaryKey = 'id_pasien'; // id_user sebagai primary key

    // Tentukan bahwa id_user bukan auto increment (karena akan menggunakan foreign key)
    public $incrementing = false; // id_user tidak auto-increment

    // Tentukan tipe data primary key jika bukan integer
    protected $keyType = 'int'; // bisa 'int' atau 'string', tergantung tipe data primary key
    public function user() 
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }

    public function pemeriksaan()
    {
        return $this->hasMany(Pemeriksaan::class);
    }

    public function riwayat_penyakit()
    {
        return $this->hasMany(RiwayatPenyakit::class);
    }
}
