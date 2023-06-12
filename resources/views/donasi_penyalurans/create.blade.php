@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Donasi Penyaluran</div>

                    <div class="card-body">
                        <form action="{{ route('donasi_penyalurans.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="anggota_id" class="form-label">Anggota</label>
                                <select class="form-select" id="anggota_id" name="anggota_id" required>
                                    <option value="">Pilih Anggota</option>
                                    @foreach ($anggotas as $anggota)
                                        <option value="{{ $anggota->id }}">{{ $anggota->nama_anggota }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="pesantren_id" class="form-label">Pesantren</label>
                                <select class="form-select" id="pesantren_id" name="pesantren_id" required>
                                    <option value="">Pilih Pesantren</option>
                                    @foreach ($pesantrens as $pesantren)
                                        <option value="{{ $pesantren->id }}">{{ $pesantren->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="donasi_diterima" class="form-label">Donasi Diterima</label>
                                <input type="text" class="form-control" id="donasi_diterima" name="donasi_diterima" required>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_penyaluran" class="form-label">Tanggal Penyaluran</label>
                                <input type="date" class="form-control" id="tanggal_penyaluran" name="tanggal_penyaluran" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('donasi_penyalurans.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
