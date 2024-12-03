<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    public function obat() 
    {
        return $this->belongsTo(Obat::class);
    }

    public function dokters()
    {
        return $this->hasMany(Dokter::class);
    }
}
