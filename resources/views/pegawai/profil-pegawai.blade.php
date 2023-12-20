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
                    @if ($pegawai->profil)
                        <img src="{{ asset('uploads/pegawai') . '/' . $pegawai->profil }}" alt="a"
                            style="object-fit: cover; height: 200px;" class="rounded-circle">
                    @else
                        <img src="{{ asset('img/undraw_profile.svg') }}" alt="a"
                            style="object-fit: cover; height: 200px;">
                    @endif

                </div>
                <div>
                    <span class="h3">{{ $pegawai->jabatan }}</span>
                </div>
            </div>
            <div class="container mb-3">
                <div class="row mb-3">
                    <div class="col-4"><span>Nama</span></div>
                    <div class="col-8"><span>: {{ $pegawai->nama }}</span></div>
                </div>
                <div class="row mb-3">
                    <div class="col-4"><span>Email</span></div>
                    <div class="col-8"><span>: {{ $pegawai->email }}</span></div>
                </div>
                <div class="row mb-3">
                    <div class="col-4"><span>Tanggal Lahir</span></div>
                    <div class="col-8"><span>: {{ $pegawai->tanggal_lahir }}</span></div>
                </div>
                <div class="row mb-3">
                    <div class="col-4"><span>Alamat</span></div>
                    <div class="col-8"><span>: {{ $pegawai->alamat }}</span></div>
                </div>
                <div class="row mb-3">
                    <div class="col-4"><span>Jenis Kelamin</span></div>
                    <div class="col-8"><span>: {{ $pegawai->jenis_kelamin }}</span></div>
                </div>
            </div>
            @if (auth()->guard('pegawai')->user()->jabatan == 'Admin' || $pegawai->id == auth()->guard('pegawai')->user()->id)
                <div class="container mb-5">
                    <a href="{{ route('edit-pegawai', ['id' => $pegawai->id]) }}" class="btn btn-primary"><i class="fa fa-pen"></i> Edit Profil</a>
                </div>
            @endif
        </div>
    </section>
@endsection
@section('addJs')
@endsection
