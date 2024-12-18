<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriObat extends Model
{
    protected $guarded = ['id'];
    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}
