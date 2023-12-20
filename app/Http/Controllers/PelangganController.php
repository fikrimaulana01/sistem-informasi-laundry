<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Layanan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function dataPelanggan()
    {
        $pelanggans = Pelanggan::all();
        return view('pegawai.data-pelanggan', compact('pelanggans'));
    }
    public function storePelanggan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_hp' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|unique:pelanggans,email',
            'password' => 'required|min:8',
        ]);

        // Hashing password sebelum menyimpan ke database
        $data = $request->all();
        $data['password'] = Hash::make($request->input('password'));

        Pelanggan::create($data);
        return redirect()->route('tambah-akun')->with('sukses', 'Akun Pelanggan berhasil ditambahkan');
    }
    public function editPelanggan($id)
    {
        $pelanggan = Pelanggan::findOrfail($id);
        return view('pegawai.edit-pelanggan', compact('pelanggan'));
    }
    public function pelangganEditPelanggan($id)
    {
        if (auth()->guard('pelanggan')->user()->id == $id) {
            $pelanggan = Pelanggan::findOrfail($id);
            return view('pelanggan.edit-pelanggan', compact('pelanggan'));
        } else {
            return redirect()->back();
        }

    }
    public function updatePelanggan(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_hp' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|email|unique:pelanggans,email,' . $id,
            'password' => 'nullable|min:8',
            'profil' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Batasan jenis file dan ukuran
        ]);
        // Mulai transaksi database
        DB::beginTransaction();

        try {


            // Langkah 2: Dapatkan data pegawai
            $pelanggan = Pelanggan::findOrFail($id);

            // Langkah 3: Update data pegawai
            $hashedPassword = $request->filled('password') ? Hash::make($request->password) : $pelanggan->password;

            $pelanggan->update([
                'nama' => $request->nama,
                'nomor_hp' => $request->nomor_hp,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'tanggal_lahir' => $request->tanggal_lahir,
                'password' => $hashedPassword ?: $pelanggan->password, // Gunakan password lama jika password baru tidak diisi
            ]);

            // Langkah 4: Handle upload file jika gambar diunggah
            if ($request->hasFile('profil')) {
                $uploadedFile = $request->file('profil');
                $fileName = time() . '_' . $uploadedFile->getClientOriginalName();

                // Pindahkan file baru ke direktori yang diinginkan (public/uploads/pegawai)
                $uploadedFile->move(public_path('uploads/pelanggan'), $fileName);

                // Hapus gambar lama jika ada
                if ($pelanggan->profil) {
                    // Hapus gambar lama dari direktori (public/uploads/pegawai)
                    unlink(public_path('uploads/pelanggan/' . $pelanggan->profil));
                }

                // Update nama file di database
                $pelanggan->update(['profil' => $fileName]);
            }

            // Commit transaksi
            DB::commit();

            return redirect()->route('data-pelanggan')->with('sukses', 'Data pelanggan berhasil diperbarui');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal memperbarui data pelanggan. Terjadi kesalahan.' . $e)->withInput();
        }
    }
    public function pelangganUpdatePelanggan(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_hp' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|email|unique:pelanggans,email,' . $id,
            'password' => 'nullable|min:8',
            'profil' => 'image|mimes:jpeg,png,jpg,gif', // Batasan jenis file dan ukuran
        ]);
        // Mulai transaksi database
        DB::beginTransaction();

        try {


            // Langkah 2: Dapatkan data pegawai
            $pelanggan = Pelanggan::findOrFail($id);

            // Langkah 3: Update data pegawai
            $hashedPassword = $request->filled('password') ? Hash::make($request->password) : $pelanggan->password;

            $pelanggan->update([
                'nama' => $request->nama,
                'nomor_hp' => $request->nomor_hp,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'tanggal_lahir' => $request->tanggal_lahir,
                'password' => $hashedPassword ?: $pelanggan->password, // Gunakan password lama jika password baru tidak diisi
            ]);

            // Langkah 4: Handle upload file jika gambar diunggah
            if ($request->hasFile('profil')) {
                $uploadedFile = $request->file('profil');
                $fileName = time() . '_' . $uploadedFile->getClientOriginalName();

                // Pindahkan file baru ke direktori yang diinginkan (public/uploads/pegawai)
                $uploadedFile->move(public_path('uploads/pelanggan'), $fileName);

                // Hapus gambar lama jika ada
                if ($pelanggan->profil) {
                    // Hapus gambar lama dari direktori (public/uploads/pegawai)
                    unlink(public_path('uploads/pelanggan/' . $pelanggan->profil));
                }

                // Update nama file di database
                $pelanggan->update(['profil' => $fileName]);
            }

            // Commit transaksi
            DB::commit();

            return redirect()->route('pelanggan-profil', ['id' => $id])->with('sukses', 'Data pelanggan berhasil diperbarui');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();

            return redirect()->back()->with('error', 'Gagal memperbarui data pelanggan. Terjadi kesalahan.' . $e->getMessage())->withInput();
        }
    }
    public function hapusPelanggan($id)
    {
        $pelanggan = Pelanggan::find($id);
        // Periksa apakah produk ada
        if (!$pelanggan) {
            return redirect()->route('data-pelanggan')->with('error', 'Pelanggan tidak ditemukan.');
        }

        // Hapus produk
        $pelanggan->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('data-pelanggan')->with('sukses', 'Pelanggan berhasil dihapus.');
    }
    
    public function dashboard()
    {
        $pesanans = Pesanan::where('id_pelanggan', auth()->guard('pelanggan')->user()->id)->take(5)->get();
        $totalPesanan = Pesanan::where('id_pelanggan', auth()->guard('pelanggan')->user()->id)->count();
        $layanans = Layanan::take(5)->get();
        $totalLayanan = Layanan::count();
        return view('pelanggan.dashboard', compact('pesanans', 'totalPesanan', 'layanans', 'totalLayanan'));
    }
    public function profil($id)
    {
        if (auth()->guard('pelanggan')->user()->id == $id) {
            $pelanggan = Pelanggan::findOrfail($id);
            return view('pelanggan.profil-pelanggan', compact('pelanggan'));
        } else {
            return redirect()->back();
        }
    }
    public function pegawaiProfil($id)
    {
        $pelanggan = Pelanggan::findOrfail($id);
        return view('pegawai.profil-pelanggan', compact('pelanggan'));
    }
}