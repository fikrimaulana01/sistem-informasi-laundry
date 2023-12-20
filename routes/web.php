<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PesananController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'pegawai'], function () {
    Route::get('/pegawai/dashboard', [PegawaiController::class, 'dashboard'])->name('pegawai-dashboard');
    Route::get('/pegawai/data-pegawai', [PegawaiController::class, 'dataPegawai'])->name('data-pegawai');
    Route::get('/pegawai/data-pelanggan', [PelangganController::class, 'dataPelanggan'])->name('data-pelanggan');
    Route::get('/pegawai/layanan', [LayananController::class, 'dataLayanan'])->name('data-layanan');
    Route::get('/pegawai/data-laundry', [PesananController::class, 'dataLaundry'])->name('data-laundry');
    Route::get('/pegawai/data-laundry-selesai', [PesananController::class, 'dataLaundrySelesai'])->name('data-laundry-selesai');
    Route::get('/pegawai/data-laundry-proses', [PesananController::class, 'dataLaundryProses'])->name('data-laundry-proses');
    Route::get('/pegawai/tambah-pesanan', [PesananController::class, 'tambahPesanan'])->name('tambah-pesanan');
    Route::post('/pegawai/tambah-pesanan', [PesananController::class, 'storePesanan'])->name('store-pesanan');
    Route::get('pegawai/edit-pesanan/{id}', [PesananController::class, 'editPesanan'])->name('edit-pesanan');
    Route::put('pegawai/edit-pesanan/{id}', [PesananController::class, 'updatePesanan'])->name('update-pesanan');
    Route::delete('pegawai/hapus-pesanan/{id}', [PesananController::class, 'hapusPesanan'])->name('hapus-pesanan');
    Route::get('/pegawai/profil-pegawai/{id}', [PegawaiController::class, 'profil'])->name('pegawai-profil-pegawai');
    Route::get('/pegawai/profil-pelanggan/{id}', [PelangganController::class, 'pegawaiProfil'])->name('pegawai-profil-pelanggan');
    Route::get('pegawai/edit-pegawai/{id}', [PegawaiController::class, 'editPegawai'])->name('edit-pegawai');
    Route::put('pegawai/edit-pegawai/{id}', [PegawaiController::class, 'updatePegawai'])->name('update-pegawai');
});
Route::group(['middleware' => 'admin'], function () {
    // pegawai
    Route::get('pegawai/tambah-pegawai', [PegawaiController::class, 'tambahPegawai'])->name('tambah-pegawai');
    Route::post('pegawai/tambah-pegawai', [PegawaiController::class, 'storePegawai'])->name('store-pegawai');
   
    Route::delete('pegawai/hapus-pegawai/{id}', [PegawaiController::class, 'hapusPegawai'])->name('hapus-pegawai');

    // pelanggan
    Route::get('pegawai/edit-pelanggan/{id}', [PelangganController::class, 'editPelanggan'])->name('edit-pelanggan');
    Route::put('pegawai/edit-pelanggan/{id}', [PelangganController::class, 'updatePelanggan'])->name('update-pelanggan');
    Route::delete('pegawai/hapus-pelanggan/{id}', [PelangganController::class, 'hapusPelanggan'])->name('hapus-pelanggan');

    // Layanan
    Route::get('pegawai/tambah-layanan', [LayananController::class, 'tambahLayanan'])->name('tambah-layanan');
    Route::post('pegawai/tambah-layanan', [LayananController::class, 'storeLayanan'])->name('store-layanan');
    Route::get('pegawai/edit-layanan/{id}', [LayananController::class, 'editLayanan'])->name('edit-layanan');
    Route::put('pegawai/edit-layanan/{id}', [LayananController::class, 'updateLayanan'])->name('update-layanan');
    Route::delete('pegawai/hapus-layanan/{id}', [LayananController::class, 'hapusLayanan'])->name('hapus-layanan');
});
Route::group(['middleware' => 'pelanggan'], function () {
    Route::get('/', [PelangganController::class, 'dashboard'])->name('pelanggan-dashboard');
    Route::get('/pelanggan/layanan', [LayananController::class, 'pelangganDataLayanan'])->name('pelanggan-data-layanan');
    Route::get('/pelanggan/data-laundry', [PesananController::class, 'pelangganDataLaundry'])->name('pelanggan-data-laundry');
    Route::get('/pelanggan/data-laundry-selesai', [PesananController::class, 'pelangganDataLaundrySelesai'])->name('pelanggan-data-laundry-selesai');
    Route::get('/pelanggan/data-laundry-proses', [PesananController::class, 'pelangganDataLaundryProses'])->name('pelanggan-data-laundry-proses');
    Route::get('pelanggan/edit-pelanggan/{id}', [PelangganController::class, 'pelangganEditPelanggan'])->name('pelanggan-edit-pelanggan');
    Route::put('pelanggan/edit-pelanggan/{id}', [PelangganController::class, 'pelangganUpdatePelanggan'])->name('pelanggan-update-pelanggan');
});
Route::get('/pelanggan/profil-pelanggan/{id}', [PelangganController::class, 'profil'])->name('pelanggan-profil');
Route::get('/tambah-akun', function () {
    return view('register');
})->name('tambah-akun');
Route::post('/tambah-akun', [PelangganController::class, 'storePelanggan'])->name('store-pelanggan');
Route::get('/login', [LoginController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');