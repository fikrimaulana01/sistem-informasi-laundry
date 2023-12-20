@extends('pelanggan.layout.master')
@section('addCss')
@endsection
@section('data-pelanggan')
    active
@endsection
@section('title')
    Edit Pelanggan
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 mb-3">
            <span class="h5 m-0 font-weight-bold text-primary">Edit Pelanggan</span>
        </div>
        <div class="card-body">
            <form class="user" method="POST" action="{{ route('pelanggan-update-pelanggan', ['id' => $pelanggan->id]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" required
                        value="{{ $pelanggan->nama }}">
                </div>
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="profil">Profil</label>
                    <input type="file" class="form-control-file" id="profil" name="profil">
                </div>
                @error('profil')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" class="form-control" id="email" name="email" required
                        value="{{ $pelanggan->email }}">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required
                                value="{{ $pelanggan->tanggal_lahir }}">
                        </div>
                        @error('tanggal_lahir')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" required name="jenis_kelamin">
                                <option value="Laki-Laki" {{ $pelanggan->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>
                                    Laki-Laki
                                </option>
                                <option value="Perempuan" {{ $pelanggan->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nomor_hp">Nomor Hp</label>
                    <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required
                        value="{{ $pelanggan->nomor_hp }}">
                    @error('nomor_hp')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="5" class="form-control" required>{{ $pelanggan->alamat }}</textarea>
                    @error('alamat')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <hr>

        </div>
    </div>
@endsection
@section('addJs')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('error'))
        <script>
            Swal.fire({
                title: "Error",
                text: "{{ session('error') }}",
                icon: "warning"
            });

            // Clear the session after displaying the success message
            @php
                session()->forget('error');
            @endphp
        </script>
    @endif
@endsection
