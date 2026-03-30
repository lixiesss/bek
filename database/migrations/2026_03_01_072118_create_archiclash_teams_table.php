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
        Schema::create('archiclash_teams', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelompok');
            $table->string('email')->unique();
            $table->string('asal_universitas');
            $table->string('domisili_universitas');
            $table->string('bukti_pembayaran'); // simpan path file
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archiclash_teams');
    }
};
