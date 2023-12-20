<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Layanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function dataLaundry()
    {
        $pesanans = Pesanan::all();
        return view('pegawai.data-laundry', compact('pesanans'));
    }
    public function dataLaundrySelesai()
    {
        $pesanans = Pesanan::where('status' , 'Selesai')->get();
        return view('pegawai.data-laundry', compact('pesanans'));
    }
    public function dataLaundryProses()
    {
        $pesanans = Pesanan::where('status' , 'Sedang DiProses')->get();
        return view('pelanggan.data-laundry', compact('pesanans'));
    }
    public function pelangganDataLaundry()
    {
        $pesanans = Pesanan::where('id_pelanggan', auth()->guard('pelanggan')->user()->id)->get();
        return view('pelanggan.data-laundry', compact('pesanans'));
    }
    public function pelangganDataLaundrySelesai()
    {
        $pesanans = Pesanan::where('id_pelanggan', auth()->guard('pelanggan')->user()->id)->where('status', 'Selesai')->get();
        return view('pelanggan.data-laundry', compact('pesanans'));
    }
    public function pelangganDataLaundryProses()
    {
        $pesanans = Pesanan::where('id_pelanggan', auth()->guard('pelanggan')->user()->id)->where('status', 'Sedang DiProses')->get();
        return view('pelanggan.data-laundry', compact('pesanans'));
    }
    public function tambahPesanan()
    {
        $layanans = Layanan::all();
        return view('pelanggan.tambah-pesanan', compact('layanans'));
    }

    public function storePesanan(Request $request)
    {
        $request->validate([
            'id_pegawai' => 'required|exists:pegawais,id',
            'id_pelanggan' => 'required|exists:pelanggans,id',
            'id_layanan' => 'required|exists:layanans,id',
            'berat' => 'required|numeric',
            'total' => 'required|numeric',
        ]);
        $layanan = Layanan::findOrfail($request->id_layanan);

        Pesanan::create([
            'id_pegawai' => $request->id_pegawai,
            'id_pelanggan' => $request->id_pelanggan,
            'id_layanan' => $request->id_layanan,
            'nama_layanan' => $layanan->nama,
            'tarif' => $layanan->tarif,
            'berat' => $request->berat,
            'status' => 'Sedang DiProses',
            'total' => $request->total,
        ]);
        return redirect()->route('data-laundry')->with('sukses', 'Pesanan Laundry berhasil ditambahkan');
    }
    public function editPesanan($id)
    {
        $layanans = Layanan::all();
        $pesanan = Pesanan::findOrfail($id);
        return view('pegawai.edit-pesanan', compact('pesanan', 'layanans'));
    }
    public function updatePesanan(Request $request, $id)
    {
        $request->validate([
            'id_pegawai' => 'required|exists:pegawais,id',
            'id_pelanggan' => 'required|exists:pelanggans,id',
            'id_layanan' => 'required|exists:layanans,id',
            'berat' => 'required|numeric',
            'total' => 'required|numeric',
            'status' => 'required',
        ]);
        $layanan = Layanan::findOrfail($request->id_layanan);
        $pesanan = Pesanan::findOrfail($id);
        $pesanan->update([
            'id_pegawai' => $request->id_pegawai,
            'id_pelanggan' => $request->id_pelanggan,
            'id_layanan' => $request->id_layanan,
            'nama_layanan' => $layanan->nama,
            'tarif' => $layanan->tarif,
            'berat' => $request->berat,
            'status' => $request->status,
            'total' => $request->total,
            // tambahkan kolom lain sesuai kebutuhan
        ]);

        return redirect()->route('data-laundry')->with('sukses', 'Data Laundry berhasil diperbarui');
    }
    public function hapusPesanan($id)
    {
        $pesanan = Pesanan::find($id);
        // Periksa apakah produk ada
        if (!$pesanan) {
            return redirect()->route('data-pesanan')->with('error', 'Pesanan tidak ditemukan.');
        }

        // Hapus produk
        $pesanan->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('data-laundry')->with('sukses', 'Pesanan berhasil dihapus.');
    }
}