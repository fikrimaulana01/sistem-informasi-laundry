<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'nama',
        'nomor_hp',
        'tanggal_lahir',
        'alamat',
        'jabatan',
        'jenis_kelamin',
        'profil',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_pegawai');
    }
}