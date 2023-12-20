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
    <section>
        <div class="card shadow">
            <div class="text-center py-5">
                <div class="mb-3">
                    @if ($pelanggan->profil)
                        <img src="{{ asset('uploads/pelanggan') . '/' . $pelanggan->profil }}" alt="a"
                            style="object-fit: cover; height: 200px;" class="rounded-circle">
                    @else
                        <img src="{{ asset('img/undraw_profile.svg') }}" alt="a"
                            style="object-fit: cover; height: 200px;">
                    @endif

                </div>
                <div>
                    <span class="h3">{{ $pelanggan->jabatan }}</span>
                </div>
            </div>
            <div class="container mb-3">
                <div class="row mb-3">
                    <div class="col-4"><span>Nama</span></div>
                    <div class="col-8"><span>: {{ $pelanggan->nama }}</span></div>
                </div>
                <div class="row mb-3">
                    <div class="col-4"><span>Email</span></div>
                    <div class="col-8"><span>: {{ $pelanggan->email }}</span></div>
                </div>
                <div class="row mb-3">
                    <div class="col-4"><span>Tanggal Lahir</span></div>
                    <div class="col-8"><span>: {{ $pelanggan->tanggal_lahir }}</span></div>
                </div>
                <div class="row mb-3">
                    <div class="col-4"><span>Alamat</span></div>
                    <div class="col-8"><span>: {{ $pelanggan->alamat }}</span></div>
                </div>
                <div class="row mb-3">
                    <div class="col-4"><span>Jenis Kelamin</span></div>
                    <div class="col-8"><span>: {{ $pelanggan->jenis_kelamin }}</span></div>
                </div>
            </div>
            @if (auth()->guard('pegawai')->user()->jabatan == 'Admin' || $pelanggan->id == auth()->guard('pelanggan')->user()->id)
                <div class="container mb-5">
                    <a href="{{ route('edit-pelanggan', ['id' => $pelanggan->id]) }}" class="btn btn-primary"><i class="fa fa-pen"></i> Edit Profil</a>
                </div>
            @endif
        </div>
    </section>
@endsection
@section('addJs')
@endsection
