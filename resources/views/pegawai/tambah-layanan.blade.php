@extends('pegawai.layout.master')
@section('addCss')
@endsection
@section('layanan')
    active
@endsection
@section('title')
    Tambah Layanan
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 mb-3">
            <span class="h5 m-0 font-weight-bold text-primary">Tambah Layanan</span>
        </div>
        <div class="card-body">
            <form class="user" method="POST" action="{{ route('store-layanan') }}">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Layanan</label>
                    <input type="text" class="form-control" id="nama" name="nama" required
                        value="{{ old('nama') }}">
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tarif">Tarif Layanan</label>
                    <input type="text" class="form-control" id="tarif" name="tarif" required
                        value="{{ old('tarif') }}">
                    @error('tarif')
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
@endsection
