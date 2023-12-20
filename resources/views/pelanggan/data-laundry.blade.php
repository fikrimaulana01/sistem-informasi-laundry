@extends('pelanggan.layout.master')
@section('addCss')
    <link href="{{ asset('vendor') }}/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('data-laundry')
    active
@endsection
@section('title')
    Data Laundry
@endsection
@section('content')
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
@endsection
@section('addJs')
    <script src="{{ asset('vendor') }}/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('vendor') }}/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js') }}/demo/datatables-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('sukses'))
        <script>
            Swal.fire({
                title: "Sukses",
                text: "{{ session('sukses') }}",
                icon: "success"
            });

            // Clear the session after displaying the success message
            @php
                session()->forget('sukses');
            @endphp
        </script>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil semua elemen tombol hapus
            var deleteButtons = document.querySelectorAll('.delete-btn');

            // Tambahkan event listener untuk setiap tombol hapus
            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var pesananId = this.getAttribute('data-id');

                    // Tampilkan konfirmasi SweetAlert
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: 'Pesanan akan dihapus secara permanen!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        // Jika pengguna menekan tombol 'Ya'
                        if (result.isConfirmed) {
                            // Submit formulir penghapusan
                            document.getElementById('deleteForm-' + pesananId).submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
