<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Layanan;
class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Layanan::create([
            'nama' => 'Reguler',
            'tarif' => '5000',
        ]);
        Layanan::create([
            'nama' => 'Express',
            'tarif' => '8000',
        ]);
        Layanan::create([
            'nama' => 'Setrika',
            'tarif' => '3000',
        ]);
    }
}