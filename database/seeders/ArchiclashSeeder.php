<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ArchiclashTeam;
use App\Models\ArchiclashParticipant;

class ArchiclashSeeder extends Seeder
{
    public function run(): void
    {
        $team = ArchiclashTeam::create([
            'nama_kelompok' => 'Tim Pencari Bug',
            'email' => 'ketuatim@gmail.com',
            'asal_universitas' => 'Universitas Indonesia',
            'domisili_universitas' => 'Depok',
            'bukti_pembayaran' => 'uploads/archiclash/bukti_bayar_dummy.jpg',
            'status' => 'pending',
        ]);

        ArchiclashParticipant::create([
            'team_id' => $team->id,
            'role' => 'ketua',
            'nama_lengkap' => 'Budi Santoso',
            'jenis_kelamin' => 'L',
            'nrp_nim' => '12345678',
            'jurusan' => 'Sistem Informasi',
            'angkatan' => 2023,
            'whatsapp' => '081234567890',
            'id_line' => 'budis',
            'jenis_konsumsi' => 'Normal',
            'alergi_makanan' => '-',
            'riwayat_penyakit' => '-',
            'alergi_obat' => '-',
            'ktm_path' => 'uploads/archiclash/ktm_budi.png',
        ]);

        ArchiclashParticipant::create([
            'team_id' => $team->id,
            'role' => 'anggota_1',
            'nama_lengkap' => 'Siti Aminah',
            'jenis_kelamin' => 'P',
            'nrp_nim' => '87654321',
            'jurusan' => 'Teknik Informatika',
            'angkatan' => 2023,
            'whatsapp' => '089876543210',
            'jenis_konsumsi' => 'Vege',
            'ktm_path' => 'uploads/archiclash/ktm_siti.jpg',
        ]);
    }
}
