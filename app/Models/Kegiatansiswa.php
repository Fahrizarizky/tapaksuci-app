<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatansiswa extends Model
{
    protected $guarded = ['id'];

    public function cabanglatihan()
    {
        return $this->belongsTo(Cabanglatihan::class);
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
