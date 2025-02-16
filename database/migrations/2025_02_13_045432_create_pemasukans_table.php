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
        Schema::create('pemasukans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi');
            $table->string('tahun_buku');
            $table->string('nama_transaksi');
            $table->string('kategori');
            $table->string('nominal');
            $table->string('pengirim');
            $table->string('penerima');
            $table->date('tanggal_pengiriman');
            $table->string('lokasi_pengiriman');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukans');
    }
};
