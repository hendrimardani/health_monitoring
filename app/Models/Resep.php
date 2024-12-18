<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resep extends Model
{
    protected $guarded = ['id'];
    public function obat() 
    {
        return $this->belongsTo(Obat::class, 'obat_id');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }

    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class);
    }
}
