@extends('pelanggan.layout.master')
@section('addCss')
    <link href="{{ asset('vendor') }}/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('layanan')
    active
@endsection
@section('title')
    Data Layanan
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 mb-3">
            <span class="h5 m-0 font-weight-bold text-primary">Data Layanan</span>
        </div>
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
                                <td class="text-right ">Rp{{ number_format($layanan->tarif, 0, '.', ',') }}</td>
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
                    var layananId = this.getAttribute('data-id');

                    // Tampilkan konfirmasi SweetAlert
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: 'Layanan akan dihapus secara permanen!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        // Jika pengguna menekan tombol 'Ya'
                        if (result.isConfirmed) {
                            // Submit formulir penghapusan
                            document.getElementById('deleteForm-' + layananId).submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
