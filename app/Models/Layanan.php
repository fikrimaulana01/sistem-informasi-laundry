<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'tarif',
    ];
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_layanan');
    }
}