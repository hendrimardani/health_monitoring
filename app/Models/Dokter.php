<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    public function diagnosa()
    {
        return $this->belongsTo(Diagnosa::class);
    }

    public function resep()
    {
        return $this->belongsTo(Resep::class);
    }
}
