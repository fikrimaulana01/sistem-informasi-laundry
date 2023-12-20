@extends('pelanggan.layout.master')
@section('addCss')
    <link href="{{ asset('vendor') }}/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('dashboard')
    active
@endsection
@section('title')
    Dashboard Pelanggan
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
    <section>
        <div class="card shadow mb-4">
            <div class="card-header py-3 mb-3">
                <span class="h5 m-0 font-weight-bold text-primary">Data Laundry</span>
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
                                    <td class="text-right ">Rp{{ number_format($pesanan->tarif, 0, '.', ',') }}</td>
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
                                    <td class="text-right ">Rp{{ number_format($pesanan->total, 0, '.', ',') }}</td>
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
    <script src="{{ asset('vendor') }}/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('vendor') }}/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js') }}/demo/datatables-demo.js"></script>
@endsection
