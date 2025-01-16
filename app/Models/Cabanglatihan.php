<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabanglatihan extends Model
{
    protected $guarded = ['id'];

    public function admin()
    {
        $this->hasOne(User::class);
    }

    public function anggotapimda()
    {
        return $this->hasMany(Anggotapimda::class);
    }

    public function pelatih()
    {
        return $this->belongsTo(Anggotapimda::class);
    }
}
