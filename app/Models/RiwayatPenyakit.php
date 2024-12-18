<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPenyakit extends Model
{
    protected $guarded = ['id'];
    // Tentukan nama tabel jika tidak menggunakan tabel default (plural form dari nama model)
    protected $table = 'riwayat_penyakits';
     
     public function pasien() {
        return $this->belongsTo(Pasien::class, 'pasien_id_pasien');
    }

    public function pemeriksaan() {
        return $this->hasMany(Pemeriksaan::class, 'id');
    }
}
