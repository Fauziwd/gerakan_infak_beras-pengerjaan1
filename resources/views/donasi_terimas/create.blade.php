<!-- resources/views/donasi_terimas/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Donasi Terima Baru</h1>

        <form action="{{ route('donasi_terimas.store') }}" method="POST">
            @csrf

<div class="mb-3">
    <label for="anggota_id" class="form-label">anggota ID</label>
    <select class="form-select" id="anggota_id" name="anggota_id" required>
        <option value="">Pilih Penanggung Jawab</option>
        @foreach($anggotas as $anggota)
            <option value="{{ $anggota->id }}">{{ $anggota->nama_anggota}}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="ota_id" class="form-label">OTA ID</label>
    <select class="form-select" id="ota_id" name="ota_id" required>
        <option value="">Pilih Penanggung Jawab</option>
        @foreach($otas as $ota)
            <option value="{{ $ota->id }}">{{ $ota->nama}}</option>
        @endforeach
    </select>
</div>


            <div class="mb-3">
                <label for="jumlah_donasi" class="form-label">Jumlah Donasi</label>
                <input type="number" class="form-control" id="jumlah_donasi" name="jumlah_donasi" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_donasi" class="form-label">Tanggal Donasi</label>
                <input type="date" class="form-control" id="tanggal_donasi" name="tanggal_donasi" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
