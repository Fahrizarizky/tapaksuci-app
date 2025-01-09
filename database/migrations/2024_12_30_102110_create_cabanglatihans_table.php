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
        Schema::create('cabanglatihans', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 10);
            $table->string('kategori', 50);
            $table->string('nama_cabang', 100);
            $table->string('alamat', 255);
            $table->string('pelatih', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabanglatihans');
    }
};
