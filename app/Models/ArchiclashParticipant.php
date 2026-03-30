<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchiclashParticipant extends Model
{
    use HasFactory;

    protected $table = 'archiclash_participants';

    protected $fillable = [
        'team_id',
        'role',
        'nama_lengkap',
        'jenis_kelamin',
        'nrp_nim',
        'jurusan',
        'angkatan',
        'whatsapp',
        'id_line',
        'jenis_konsumsi',
        'alergi_makanan',
        'riwayat_penyakit',
        'alergi_obat',
        'ktm_path',
    ];

    // Anggota ini milik Tim yang mana (Inverse 1-to-Many)
    public function team()
    {
        return $this->belongsTo(ArchiclashTeam::class, 'team_id');
    }
}
