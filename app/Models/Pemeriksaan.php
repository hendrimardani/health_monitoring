<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    protected $guarded = ['id'];
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }

    public function vital_sign()
    {
        return $this->belongsTo(VitalSign::class, 'id_vital_sign');
    }

    public function diagnosa()
    {
        return $this->belongsTo(Diagnosa::class, 'id_diagnosa');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }

    public function riwayat_penyakit()
    {
        return $this->belongsTo(RiwayatPenyakit::class);
    }
}
