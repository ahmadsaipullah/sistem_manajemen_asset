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
        Schema::create('aikas', function (Blueprint $table) {
            $table->id();
            $table->string('nbm');
            $table->string('nama_kegiatan');
            $table->string('lokasi_kegiatan');
            $table->string('sk_kegiatan');
            $table->string('tanggal_sk_kegiatan');
            $table->string('jumlah_sks');
            $table->string('dokumen');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aikas');
    }
};
