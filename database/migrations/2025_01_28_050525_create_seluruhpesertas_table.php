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
        Schema::create('seluruhpesertas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('tahunmasuk_ts');
            $table->string('cabang');
            $table->string('kategori_ukt');
            $table->foreignId('kegiatan_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seluruhpesertas');
    }
};
