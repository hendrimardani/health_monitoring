<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $guarded = ['id'];
    // Tentukan nama tabel jika tidak menggunakan tabel default (plural form dari nama model)
    protected $table = 'dokters';

    // Tentukan primary key untuk model ini
    protected $primaryKey = 'id_dokter'; // id_user sebagai primary key

    // Tentukan bahwa id_user bukan auto increment (karena akan menggunakan foreign key)
    public $incrementing = false; // id_user tidak auto-increment

    // Tentukan tipe data primary key jika bukan integer
    protected $keyType = 'int'; // bisa 'int' atau 'string', tergantung tipe data primary key
    
    public function diagnosa()
    {
        return $this->belongsTo(Diagnosa::class);
    }

    public function resep()
    {
        return $this->belongsTo(Resep::class);
    }

    public function pemeriksaan()
    {
        return $this->hasMany(Dokter::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }
}
