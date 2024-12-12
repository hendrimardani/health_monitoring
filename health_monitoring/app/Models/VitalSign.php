<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    protected $guarded = ['id'];
    public function pemeriksaan()
    {
        return $this->hasMany(Pemeriksaan::class);
    }
}
