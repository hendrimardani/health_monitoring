<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    public function farmasi() 
    {
        // One to One
        return $this->belongsTo(Farmasi::class);
    }

    public function reseps() 
    {
        return $this->hasMany(Resep::class);
    }
}
