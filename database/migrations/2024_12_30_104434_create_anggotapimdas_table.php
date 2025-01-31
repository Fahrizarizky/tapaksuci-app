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
        Schema::create('anggotapimdas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cabanglatihan_id');
            $table->string('nikd', 50);
            $table->string('nama', 100);
            $table->string('tempat_lahir', 100);
            $table->string('tanggal_lahir', 100);
            $table->string('jenis_kelamin', 100);
            $table->string('alamat', 100);
            $table->string('email', 100)->nullable();
            $table->string('no_telp', 50);
            $table->string('tingkatan', 50);
            $table->string('tahun_masuk', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotapimdas');
    }
};
