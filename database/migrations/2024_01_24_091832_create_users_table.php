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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('level_id');
            $table->string('password');
            //relasi ke table levels
            $table->foreign('level_id')->references('id')->on('levels');

            $table->string('image')->nullable();
            $table->string('nip')->unique()->default('-');
            $table->string('nidn')->unique()->default('-');
            $table->string('fakultas')->default('-');
            $table->string('prodi')->default('-');
            $table->string('status_dosen')->default('-');
            $table->string('jabatan_fungsional')->default('-');
            $table->string('jabatan')->default('-');
            $table->string('status_serdos')->default('-');
            $table->string('status_keaktifan')->default('-');
            $table->string('no_hp')->default('-');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
