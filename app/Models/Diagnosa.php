<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    // Kebalikan dari $fillable, atribute id tidak boleh diubah
    protected $guarded = ['id'];
    public function pemeriksaan()
    {
        return $this->hasMany(Pemeriksaan::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }
}
