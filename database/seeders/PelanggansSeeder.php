<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Database\Factories\PelangganFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PelanggansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Pelanggan::create([
            'nama' => 'Fikri Maulana',
            'nomor_hp' => '089628437540',
            'tanggal_lahir' => '2000-01-01',
            'alamat' => 'Jl. Lobak',
            'jenis_kelamin' => 'Laki-laki',
            'email' => 'fikrimaulana@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // Gantilah 'password123' dengan password yang Anda inginkan
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Pelanggan::factory()->count(5)->create();
    }
}