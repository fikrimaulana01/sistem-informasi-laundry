<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pegawai',
        'id_pelanggan',
        'id_layanan',
        'nama_layanan',
        'tarif',
        'berat',
        'status',
        'total',
    ];
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan');
    }
}