<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $guarded = ['id'];

    public function aspeknilaiukt()
    {
        return $this->hasMany(Aspeknilaiukt::class);
    }

    public function seluruhpeserta()
    {
        return $this->hasMany(Seluruhpeserta::class);
    }

    public function aspeknilailkpts()
    {
        return $this->hasMany(Aspeknilailkpts::class);
    }

    public function kategoriukt()
    {
        return $this->hasOne(Kategoriukt::class);
    }

    public function kegiatansiswa()
    {
        return $this->hasMany(Kegiatansiswa::class);
    }
}
