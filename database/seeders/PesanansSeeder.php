<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pesanan;
use App\Models\Layanan;

class PesanansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id_layanan = 1;
        $layanan = Layanan::find($id_layanan);

            // Gunakan tarif dari data Layanan
            $tarif = $layanan->tarif;
            $berat = 3.5;
            $total = $berat * $tarif;
        Pesanan::create([
            'id_pegawai' => 2,
            'id_pelanggan' => 1,
            'id_layanan' => $id_layanan,
            'nama_layanan' => $layanan->nama,
            'tarif' => $layanan->tarif,
            'berat' => $berat,
            'status' => 'Sedang DiProses',
            'total' => $total,
        ]);
        $id_layanan = 2;
        $layanan = Layanan::find($id_layanan);

        // Gunakan tarif dari data Layanan
        $tarif = $layanan->tarif;
        $berat = 3;
        $total = $berat * $tarif;
        Pesanan::create([
            'id_pegawai' => 2,
            'id_pelanggan' => 1,
            'id_layanan' => $id_layanan,
            'nama_layanan' => $layanan->nama,
            'tarif' => $layanan->tarif,
            'berat' => $berat,
            'status' => 'Sedang DiProses',
            'total' => $total,
        ]);
        $id_layanan = 3;
        $layanan = Layanan::find($id_layanan);

        // Gunakan tarif dari data Layanan
        $tarif = $layanan->tarif;
        $berat = 5;
        $total = $berat * $tarif;
        Pesanan::create([
            'id_pegawai' => 2,
            'id_pelanggan' => 1,
            'id_layanan' => $id_layanan,
            'nama_layanan' => $layanan->nama,
            'tarif' => $layanan->tarif,
            'berat' => $berat,
            'status' => 'Sedang DiProses',
            'total' => $total,
        ]);
        $id_layanan = 3;
        $layanan = Layanan::find($id_layanan);

        // Gunakan tarif dari data Layanan
        $tarif = $layanan->tarif;
        $berat = 2;
        $total = $berat * $tarif;
        Pesanan::create([
            'id_pegawai' => 2,
            'id_pelanggan' => 1,
            'id_layanan' => $id_layanan,
            'nama_layanan' => $layanan->nama,
            'tarif' => $layanan->tarif,
            'berat' => $berat,
            'status' => 'Sedang DiProses',
            'total' => $total,
        ]);
        $id_layanan = 2;
        $layanan = Layanan::find($id_layanan);

        // Gunakan tarif dari data Layanan
        $tarif = $layanan->tarif;
        $berat = 4;
        $total = $berat * $tarif;
        Pesanan::create([
            'id_pegawai' => 2,
            'id_pelanggan' => 1,
            'id_layanan' => $id_layanan,
            'nama_layanan' => $layanan->nama,
            'tarif' => $layanan->tarif,
            'berat' => $berat,
            'status' => 'Sedang DiProses',
            'total' => $total,
        ]);
    }
}