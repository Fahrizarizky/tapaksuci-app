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
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi');
            $table->string('tahun_buku');
            $table->string('nama_transaksi');
            $table->string('nominal');
            $table->string('peminta');
            $table->string('pemberi');
            $table->date('tanggal_penyerahan');
            $table->string('lokasi_penyerahan');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};
