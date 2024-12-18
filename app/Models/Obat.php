<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $guarded = ['id'];
    public function farmasi() 
    {
        // One to Many
        return $this->hasMany(Farmasi::class, 'farmasi_id');
    }

    public function resep() 
    {
        return $this->hasMany(Resep::class);
    }

    public function kategori_obat()
    {
        return $this->hasMany(KategoriObat::class, 'kategori_id');
    }
}
