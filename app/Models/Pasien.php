<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $guarded = ['id'];
    protected $primaryKey = 'id_pasien';
    public function user() 
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pemeriksaan()
    {
        return $this->hasMany(Pemeriksaan::class);
    }
}
