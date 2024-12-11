<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $guarded = ['id'];
    public function obat() 
    {
        return $this->belongsTo(Obat::class);
    }

    public function dokters()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }
}
