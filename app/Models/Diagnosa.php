<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class);
    }

    public function dokter()
    {
        return $this->belongsTo(dokter::class);
    }
}
