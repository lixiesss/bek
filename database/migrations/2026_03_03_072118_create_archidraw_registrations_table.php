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
        Schema::create('archidraw_registrations', function (Blueprint $table) {
            $table->id();
            $table->enum('kategori', ['A', 'B']); // A: SD 1-3, B: SD 4-6
            $table->string('nama_lengkap');
            $table->string('email');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('asal_sekolah');
            $table->string('domisili_sekolah');
            $table->integer('kelas');
            $table->string('whatsapp');
            $table->string('id_line')->nullable();
            $table->string('jenis_konsumsi');
            $table->text('alergi_makanan')->nullable();
            $table->text('riwayat_penyakit')->nullable();
            $table->string('kartu_pelajar_path');
            $table->string('bukti_bayar_path');
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archidraw_registrations');
    }
};
