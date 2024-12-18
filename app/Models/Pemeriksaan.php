<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    protected $guarded = ['id'];
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }

    public function vital_sign()
    {
        return $this->belongsTo(VitalSign::class, 'vital_sign_id');
    }

    public function diagnosa()
    {
        return $this->belongsTo(Diagnosa::class, 'diagnosa_id');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }

    public function riwayat_penyakit()
    {
        return $this->belongsTo(RiwayatPenyakit::class);
    }

    public function resep()
    {
        // id dari entitas Resep
        return $this->hasMany(Resep::class, 'resep_id');
    }
}
