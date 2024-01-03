@extends('pegawai.layout.master')
@section('addCss')
    <link href="{{ asset('vendor') }}/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('data-pelanggan')
    active
@endsection
@section('title')
    Data Pelanggan
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 mb-3">
            <span class="h5 m-0 font-weight-bold text-primary">Data Pelanggan</span>
        </div>
        @if (auth()->guard('pegawai')->user()->jabatan == 'Admin')
            <div class="px-3">
                <a href="{{ route('tambah-akun') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Pelanggan</a>
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>No Hp</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th>No Hp</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($pelanggans as $pelanggan)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $pelanggan->id }}</td>
                                <td>{{ $pelanggan->nama }}</td>
                                <td>{{ $pelanggan->nomor_hp }}</td>
                                <td>{{ $pelanggan->tanggal_lahir }}</td>
                                <td>{{ $pelanggan->alamat }}</td>
                                <td>{{ $pelanggan->jenis_kelamin }}</td>
                                <td>{{ $pelanggan->email }}</td>
                                <td>
                                    <div class="d-flex align-items-center ">
                                        <div class="mr-3">
                                            <a href="{{ route('pegawai-profil-pelanggan', ['id' => $pelanggan->id]) }}"
                                                class="btn btn-success d-flex align-items-center "><i
                                                    class="fa fa-eye p-1"></i></a>
                                        </div>
                                        @if (auth()->guard('pegawai')->user()->jabatan == 'Admin')
                                            <div class="mr-3">
                                                <a href="{{ route('edit-pelanggan', ['id' => $pelanggan->id]) }}"
                                                    class="btn btn-primary d-flex align-items-center "><i
                                                        class="fa fa-pen p-1"></i></a>
                                            </div>
                                            <div class="mr-3">
                                                <form id="deleteForm-{{ $pelanggan->id }}"
                                                    action="{{ route('hapus-pelanggan', ['id' => $pelanggan->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button"
                                                        class="btn btn-danger d-flex align-items-center delete-btn"
                                                        data-id="{{ $pelanggan->id }}">
                                                        <i class="fa fa-trash p-1"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                </td>
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
                    var pelangganId = this.getAttribute('data-id');

                    // Tampilkan konfirmasi SweetAlert
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: 'Pelanggan akan dihapus secara permanen!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        // Jika pengguna menekan tombol 'Ya'
                        if (result.isConfirmed) {
                            // Submit formulir penghapusan
                            document.getElementById('deleteForm-' + pelangganId).submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
