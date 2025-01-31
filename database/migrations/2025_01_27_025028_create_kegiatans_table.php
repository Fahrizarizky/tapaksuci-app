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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('waktu');
            $table->string('lokasi');
            $table->string('ketua_panitia');
            $table->string('wakilketua_panitia');
            $table->string('sekretaris_panitia');
            $table->string('bendahara_panitia');
            $table->string('jenis');
            $table->boolean('status')->default(true);
            $table->integer('jumlah_cabang')->default(0);
            $table->integer('jumlah_peserta')->default(0);
            $table->string('kategori_ukt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
