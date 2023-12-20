@extends('pegawai.layout.master')
@section('addCss')
@endsection
@section('laundry')
    active
@endsection
@section('title')
    Edit Pesanan
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 mb-3">
            <span class="h5 m-0 font-weight-bold text-primary">Edit Pesanan</span>
        </div>
        <div class="card-body">
            <form class="user" method="POST" action="{{ route('update-pesanan', ['id' => $pesanan->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group d-none">
                    <label for="id_pegawai">Id Pegawai</label>
                    <input type="text" class="form-control" id="id_pegawai" name="id_pegawai" required
                        value="{{ auth()->guard('pegawai')->user()->id }}">
                    @error('id_pegawai')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_pelanggan">Id Pelanggan</label>
                    <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" required
                        value="{{ $pesanan->id_pelanggan }}" @if (auth()->guard('pegawai')->user()->jabatan == 'Pegawai') readonly @endif>
                    @error('id_pelanggan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_layanan">Layanan</label>
                    <select class="form-control" id="id_layanan" required name="id_layanan"  @if (auth()->guard('pegawai')->user()->jabatan == 'Pegawai') readonly @endif>
                        @foreach ($layanans as $layanan)
                            <option value="{{ $layanan->id }}"
                                {{ $pesanan->id_pelanggan == $layanan->nama ? 'selected' : '' }}>
                                {{ $layanan->nama }} : Rp{{ number_format($layanan->tarif, 0, '.', ',') }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_layanan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="berat">Berat Pakaian (Satuan Kg)</label>
                    <input type="text" class="form-control" id="berat" name="berat" required
                        value="{{ $pesanan->berat }}"  @if (auth()->guard('pegawai')->user()->jabatan == 'Pegawai') readonly @endif>
                    <div>
                        <span>Jika berat pakaian berkoma harap pakai titik contoh : <span
                                class="text-info">2.5</span></span>
                    </div>
                    @error('berat')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total">Total</label>
                    <input type="text" class="form-control" id="total" name="total" readonly required
                        value="{{ $pesanan->total }}">
                    @error('total')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" required name="status">
                        <option value="Sedang DiProses" {{ $pesanan->status == 'Sedang DiProses' ? 'selected' : '' }}>
                            Sedang DiProses</option>
                        <option value="Sudah Bisa Diambil"
                            {{ $pesanan->status == 'Sudah Bisa Diambil' ? 'selected' : '' }}>Sudah Bisa Diambil</option>
                        <option value="Selesai" {{ $pesanan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="Batal" {{ $pesanan->status == 'Batal' ? 'selected' : '' }}>Batal</option>
                    </select>
                    @error('status')
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const beratInput = document.getElementById("berat");
            const layananSelect = document.getElementById("id_layanan");
            const totalInput = document.getElementById("total");

            function hitungTotal() {
                const berat = parseFloat(beratInput.value);
                const tarif = parseFloat(layananSelect.options[layananSelect.selectedIndex].text.split(":")[1]
                    .replace('Rp', '').replace(',', '').trim());

                const total = berat * tarif;

                totalInput.value = isNaN(total) ? '' : Math.round(total);
            }

            beratInput.addEventListener("input", hitungTotal);
            layananSelect.addEventListener("change", hitungTotal);
        });
    </script>
@endsection
