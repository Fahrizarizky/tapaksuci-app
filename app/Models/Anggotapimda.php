<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggotapimda extends Model
{
    protected $guarded = ['id'];

    public function riwayatkaderisasi()
    {
        return $this->hasMany(Riwayatkaderisasi::class);
    }

    public function cabanglatihan()
    {
        return $this->belongsTo(Cabanglatihan::class);
    }

    public function pelatih()
    {
        return $this->hasOne(Cabanglatihan::class);
    }
}
