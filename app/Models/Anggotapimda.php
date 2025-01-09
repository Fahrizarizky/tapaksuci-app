<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggotapimda extends Model
{
    protected $guarded = ['id'];

    public function riwayatkaderisasi() {
        return $this->hasMany(Riwayatkaderisasi::class);
    }
}
