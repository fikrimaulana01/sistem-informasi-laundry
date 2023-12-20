@extends('pegawai.layout.master')
@section('addCss')
@endsection
@section('dashboard')
    active
@endsection
@section('title')
    Dashboard Pegawai
@endsection
@section('content')
    <section class="mb-5">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Pegawai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPegawai }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Pelanggan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPelanggan }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Pesanan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPesanan }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Layanan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalLayanan }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3 mb-3">
                <span class="h5 m-0 font-weight-bold text-primary">Data Pegawai</span>
            </div>
            @if (auth()->guard('pegawai')->user()->jabatan == 'Admin')
                <div class="px-3">
                    <a href="{{ route('tambah-pegawai') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                        Pegawai</a>
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Hp</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Jabatan</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Hp</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Jabatan</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($pegawais as $pegawai)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $pegawai->nama }}</td>
                                    <td>{{ $pegawai->nomor_hp }}</td>
                                    <td>{{ $pegawai->tanggal_lahir }}</td>
                                    <td>{{ $pegawai->alamat }}</td>
                                    <td>{{ $pegawai->jenis_kelamin }}</td>
                                    <td>{{ $pegawai->email }}</td>
                                    <td>{{ $pegawai->jabatan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-5">
        <div class="row">
            <div class="col-md-5">
                <div class="card shadow mb-4 h-100">
                    <div class="card-header py-3 mb-3">
                        <span class="h5 m-0 font-weight-bold text-primary">Data Layanan</span>
                    </div>
                    @if (auth()->guard('pegawai')->user()->jabatan == 'Admin')
                        <div class="px-3">
                            <a href="{{ route('tambah-layanan') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                                Tambah Layanan</a>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($layanans as $layanan)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $layanan->nama }}</td>
                                            <td class="text-right ">Rp{{ number_format($layanan->tarif, 0, '.', ',') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card shadow mb-4 h-100">
                    <div class="card-header py-3 mb-3">
                        <span class="h5 m-0 font-weight-bold text-primary">Data Laundry</span>
                    </div>
                    <div class="px-3">
                        <a href="{{ route('tambah-pesanan') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Tambah
                            Pesanan
                            Laundry</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Pesanan</th>
                                        <th>Pegawai</th>
                                        <th>Pelanggan</th>
                                        <th>Layanan</th>
                                        <th>Tarif</th>
                                        <th>Berat</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Pesanan</th>
                                        <th>Pegawai</th>
                                        <th>Pelanggan</th>
                                        <th>Layanan</th>
                                        <th>tarif</th>
                                        <th>Berat</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($pesanans as $pesanan)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $pesanan->id }}</td>
                                            <td>{{ $pesanan->pegawai->nama }}</td>
                                            <td>{{ $pesanan->pelanggan->nama }}</td>
                                            <td>{{ $pesanan->nama_layanan }}</td>
                                            <td class="text-right ">Rp{{ number_format($pesanan->tarif, 0, '.', ',') }}
                                            </td>
                                            <td>{{ $pesanan->berat }} Kg</td>
                                            <td>
                                                <div
                                                    class=" 
                                        @if (strtolower($pesanan->status) == 'sedang diproses') bg-warning
                                        @elseif(strtolower($pesanan->status) == 'sudah bisa diambil') 
                                        bg-info
                                        @elseif(strtolower($pesanan->status) == 'selesai') 
                                        bg-success
                                        @elseif(strtolower($pesanan->status) == 'batal') 
                                        bg-danger @endif text-white text-center rounded">
                                                    {{ $pesanan->status }}</div>
                                            </td>
                                            <td class="text-right ">Rp{{ number_format($pesanan->total, 0, '.', ',') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="card shadow mb-4">
            <div class="card-header py-3 mb-3">
                <span class="h5 m-0 font-weight-bold text-primary">Data Pelanggan</span>
            </div>
            @if (auth()->guard('pegawai')->user()->jabatan == 'Admin')
                <div class="px-3">
                    <a href="{{ route('tambah-akun') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                        Pelanggan</a>
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Hp</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Hp</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($pelanggans as $pelanggan)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $pelanggan->nama }}</td>
                                    <td>{{ $pelanggan->nomor_hp }}</td>
                                    <td>{{ $pelanggan->tanggal_lahir }}</td>
                                    <td>{{ $pelanggan->alamat }}</td>
                                    <td>{{ $pelanggan->jenis_kelamin }}</td>
                                    <td>{{ $pelanggan->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('addJs')
@endsection
