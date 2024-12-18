<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPenyakit extends Model
{
    protected $guarded = ['id'];
     
     public function pasien() {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }

    public function pemeriksaan() {
        return $this->belongsTo(Pemeriksaan::class, 'pemeriksaan_id');
    }
}
