<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Ganti nama tabel menjadi archiclash_participants dan sesuaikan kolomnya
        Schema::create('archiclash_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('archiclash_teams')->onDelete('cascade');
            $table->enum('role', ['ketua', 'anggota_1', 'anggota_2']);
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('nrp_nim');
            $table->string('jurusan');
            $table->integer('angkatan');
            $table->string('whatsapp');
            $table->string('id_line')->nullable();
            $table->string('jenis_konsumsi'); // Normal, Vege, Vegan
            $table->text('alergi_makanan')->nullable();
            $table->text('riwayat_penyakit')->nullable();
            $table->text('alergi_obat')->nullable();
            $table->string('ktm_path');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('archiclash_participants');
    }
};
