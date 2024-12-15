<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPenyakit extends Model
{
    protected $guarded = ['id'];
    // Tentukan nama tabel jika tidak menggunakan tabel default (plural form dari nama model)
    protected $table = 'riwayat_penyakits';
     
     public function Pasien() {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }
}
