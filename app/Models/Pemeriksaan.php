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
}
