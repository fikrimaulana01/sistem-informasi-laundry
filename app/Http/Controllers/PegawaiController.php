<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Pegawai;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Layanan;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function dataPegawai()
    {
        $pegawais = Pegawai::all();
        return view('pegawai.data-pegawai', compact('pegawais'));
    }
    public function tambahPegawai()
    {
        return view('pegawai.tambah-pegawai');
    }
    public function storePegawai(Request $request)
    {
        // Langkah 1: Validasi permintaan
        $request->validate([
            'nama' => 'required',
            'nomor_hp' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'jenis_kelamin' => 'required',
            'profil' => 'required|image|mimes:jpeg,png,jpg,gif', // Batasan jenis file dan ukuran
            'email' => 'required|unique:pegawais,email',
            'password' => 'required|min:8',
        ]);

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Hash password sebelum menyimpan ke database
            $data = $request->all();
            $data['password'] = Hash::make($request->input('password'));

            // Simpan ke database
            $pegawai = Pegawai::create($data);

            // Handle upload file jika penambahan data berhasil
            if ($request->hasFile('profil')) {
                $uploadedFile = $request->file('profil');
                $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
                $uploadedFile->move(public_path('uploads/pegawai'), $fileName);

                // Update nama file di database
                $pegawai->update(['profil' => $fileName]);
            }

            // Commit transaksi
            DB::commit();

            return redirect()->route('data-pegawai')->with('sukses', 'Pegawai berhasil ditambahkan');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();

            return redirect()->back()->with('error', 'Gagal menambahkan pegawai. Terjadi kesalahan.')->withInput();
        }
    }
    public function editPegawai($id)
    {
       if (auth()->guard('pegawai')->user()->jabatan == 'Admin' || $id == auth()->guard('pegawai')->user()->id){
         $pegawai = Pegawai::findOrfail($id);
        return view('pegawai.edit-pegawai', compact('pegawai'));
       }
       
    }
    public function updatePegawai(Request $request, $id)
    {
        // Langkah 1: Validasi permintaan
        $request->validate([
            'nama' => 'required',
            'nomor_hp' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|email|unique:pegawais,email,' . $id,
            'password' => 'nullable|min:8',
            'profil' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Batasan jenis file dan ukuran
        ]);
        // Mulai transaksi database
        DB::beginTransaction();

        try {
           

            // Langkah 2: Dapatkan data pegawai
            $pegawai = Pegawai::findOrFail($id);

            // Langkah 3: Update data pegawai
            $hashedPassword = $request->filled('password') ? Hash::make($request->password) : $pegawai->password;

            $pegawai->update([
                'nama' => $request->nama,
                'nomor_hp' => $request->nomor_hp,
                'alamat' => $request->alamat,
                'jabatan' => $request->jabatan,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'tanggal_lahir' => $request->tanggal_lahir,
                'password' => $hashedPassword ?: $pegawai->password, // Gunakan password lama jika password baru tidak diisi
            ]);

            // Langkah 4: Handle upload file jika gambar diunggah
            if ($request->hasFile('profil')) {
                $uploadedFile = $request->file('profil');
                $fileName = time() . '_' . $uploadedFile->getClientOriginalName();

                // Pindahkan file baru ke direktori yang diinginkan (public/uploads/pegawai)
                $uploadedFile->move(public_path('uploads/pegawai'), $fileName);

                // Hapus gambar lama jika ada
                if ($pegawai->profil) {
                    // Hapus gambar lama dari direktori (public/uploads/pegawai)
                    unlink(public_path('uploads/pegawai/' . $pegawai->profil));
                }

                // Update nama file di database
                $pegawai->update(['profil' => $fileName]);
            }

            // Commit transaksi
            DB::commit();

            return redirect()->route('data-pegawai')->with('sukses', 'Data pegawai berhasil diperbarui');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();

            return redirect()->back()->with('error', 'Gagal memperbarui data pegawai. Terjadi kesalahan.')->withInput();
        }
    }
    public function hapusPegawai($id)
    {
        $pegawai = Pegawai::find($id);
        // Periksa apakah produk ada
        if (!$pegawai) {
            return redirect()->route('data-pegawai')->with('error', 'Pegawai tidak ditemukan.');
        }

        // Hapus produk
        $pegawai->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('data-pegawai')->with('sukses', 'Pegawai berhasil dihapus.');
    }
    public function dashboard()
    {
        $pegawais = Pegawai::take(5)->get();
        $totalPegawai = Pegawai::count();
        $pelanggans = Pelanggan::take(5)->get();
        $totalPelanggan = Pelanggan::count();
        $layanans = Layanan::take(5)->get();
        $totalLayanan = Layanan::count();
        $pesanans = Pesanan::take(5)->get();
        $totalPesanan = Pesanan::count();
        return view('pegawai.dashboard', compact('pegawais', 'totalPegawai', 'pelanggans', 'totalPelanggan', 'layanans', 'totalLayanan', 'pesanans', 'totalPesanan'));
    }
    public function profil($id)
    {
        $pegawai = Pegawai::findOrfail($id);
        return view('pegawai.profil-pegawai', compact('pegawai'));
    }
}