<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ArchidrawRegistration;

class ArchidrawSeeder extends Seeder
{
    public function run(): void
    {
        ArchidrawRegistration::create([
            'kategori' => 'A', // SD 1-3
            'nama_lengkap' => 'Adik Pintar',
            'email' => 'orangtua@gmail.com',
            'jenis_kelamin' => 'L',
            'asal_sekolah' => 'SDN Margorejo 1',
            'domisili_sekolah' => 'Surabaya',
            'kelas' => 3,
            'whatsapp' => '08111222333',
            'jenis_konsumsi' => 'Normal',
            'alergi_makanan' => 'Kacang',
            'riwayat_penyakit' => 'Asma',
            'kartu_pelajar_path' => 'uploads/archidraw/pelajar_adik.jpg',
            'bukti_bayar_path' => 'uploads/archidraw/bayar_adik.png',
            'status' => 'verified',
        ]);
    }
}
