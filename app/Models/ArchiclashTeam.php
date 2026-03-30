<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchiclashTeam extends Model
{
    use HasFactory;

    protected $table = 'archiclash_teams';

    protected $fillable = [
        'nama_kelompok',
        'email',
        'asal_universitas',
        'domisili_universitas',
        'bukti_pembayaran',
        'status',
    ];

    // Satu Tim punya Banyak Anggota (1-to-Many)
    public function participants()
    {
        return $this->hasMany(ArchiclashParticipant::class, 'team_id');
    }
}
