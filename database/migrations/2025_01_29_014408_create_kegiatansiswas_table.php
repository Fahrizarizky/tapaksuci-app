<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kegiatansiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nikd');
            $table->string('nama_siswa');
            $table->string('nama_kegiatan');
            $table->foreignId('cabanglatihan_id');
            $table->foreignId('kegiatan_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatansiswas');
    }
};
