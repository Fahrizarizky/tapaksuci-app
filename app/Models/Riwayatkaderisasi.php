<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Riwayatkaderisasi extends Model
{
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        // static::deleting(function ($riwayatkaderisasi) {
        //     // Hapus file gambar dari storage
        //     if ($riwayatkaderisasi->ijazah && Storage::exists('public/' . $riwayatkaderisasi->ijazah)) {
        //         Storage::delete('public/' . $riwayatkaderisasi->ijazah);
        //     }
        // });

        static::deleting(function ($riwayatkaderisasi) {
            // Hapus file gambar dari storage
            $filePath = storage_path('app/public/' . $riwayatkaderisasi->ijazah);

            // // Debugging: Periksa path file
            // dd($filePath);  // Periksa apakah pathnya benar

            // Hapus file jika ada
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        });
    }
}
