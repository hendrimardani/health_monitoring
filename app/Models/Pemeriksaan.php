<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function vital_sign()
    {
        return $this->belongsTo(VitalSign::class);
    }

    public function diagnosa()
    {
        return $this->hasMany(Diagnosa::class);
    }
}
