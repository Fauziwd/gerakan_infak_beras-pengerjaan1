@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Tambah Stok Barang</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('stok_barangs.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="donasi_terima_id" class="form-label">Donasi Terima ID</label>
                                <select class="form-select" id="donasi_terima_id" name="donasi_terima_id" required>
                                    <option value="">Pilih Donasi Terima</option>
                                    @foreach ($donasiTerimas as $donasiTerima)
                                        <option value="{{ $donasiTerima->id }}">{{ $donasiTerima->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="donasi_penyaluran_id" class="form-label">Donasi Penyaluran ID</label>
                                <select class="form-select" id="donasi_penyaluran_id" name="donasi_penyaluran_id" required>
                                    <option value="">Pilih Donasi Penyaluran</option>
                                    @foreach ($donasiPenyalurans as $donasiPenyaluran)
                                        <option value="{{ $donasiPenyaluran->id }}">{{ $donasiPenyaluran->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" class="form-control" id="stok" name="stok" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
