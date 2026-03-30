<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Pastikan tabelnya mengarah ke 'admins' (jika kamu pakai tabel terpisah)
    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        'is_admin',
        'dept_id',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
    ];
}
