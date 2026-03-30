<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchidrawRegistration extends Model
{
    use HasFactory;

    protected $table = 'archidraw_registrations';

    protected $fillable = [
        'kategori',
        'nama_lengkap',
        'email',
        'jenis_kelamin',
        'asal_sekolah',
        'domisili_sekolah',
        'kelas',
        'whatsapp',
        'id_line',
        'jenis_konsumsi',
        'alergi_makanan',
        'riwayat_penyakit',
        'kartu_pelajar_path',
        'bukti_bayar_path',
        'status',
    ];
}
