<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seluruhpeserta extends Model
{
    protected $guarded = ['id'];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
