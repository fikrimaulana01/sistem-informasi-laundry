<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function dataLayanan()
    {
        $layanans = Layanan::all();
        return view('pegawai.data-layanan', compact('layanans'));
    }
    public function pelangganDataLayanan()
    {
        $layanans = Layanan::all();
        return view('pelanggan.data-layanan', compact('layanans'));
    }
    public function tambahLayanan()
    {
        return view('pegawai.tambah-layanan');
    }
    public function storeLayanan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tarif' => 'required|numeric',
        ]);

        Layanan::create([
            'nama' => $request->nama,
            'tarif' => $request->tarif,
        ]);
        return redirect()->route('data-layanan')->with('sukses', 'Layanan berhasil ditambahkan');
    }
    public function editLayanan($id)
    {
        $layanan = Layanan::findOrfail($id);
        return view('pegawai.edit-layanan', compact('layanan'));
    }
    public function updateLayanan(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tarif' => 'required|numeric',
        ]);
        $layanan = Layanan::findOrfail($id);
        $layanan->update([
            'nama' => $request->nama,
            'tarif' => $request->tarif,
            // tambahkan kolom lain sesuai kebutuhan
        ]);

        return redirect()->route('data-layanan')->with('sukses', 'Data layanan berhasil diperbarui');
    }
    public function hapusLayanan($id)
    {
        $layanan = Layanan::find($id);
        // Periksa apakah produk ada
        if (!$layanan) {
            return redirect()->route('data-pegawai')->with('error', 'Layanan tidak ditemukan.');
        }

        // Hapus produk
        $layanan->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('data-layanan')->with('sukses', 'Layanan berhasil dihapus.');
    }
}