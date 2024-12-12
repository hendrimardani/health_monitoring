<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farmasi extends Model
{
    protected $guarded = ['id'];

    public function obat() {
        // One to One
        return $this->belongsTo(Obat::class);
    }
}
