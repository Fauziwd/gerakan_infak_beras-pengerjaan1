<!-- resources/views/donasi_terimas/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Donasi Terima</h1>

        <form action="{{ route('donasi_terimas.update', $donasiTerima->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="anggota_id" class="form-label">Anggota</label>
                <select class="form-select" id="anggota_id" name="anggota_id" required>
                    <option value="">Pilih Anggota</option>
                    @foreach ($anggotas as $anggota)
                        <option value="{{ $anggota->id }}" {{ $donasiTerima->anggota_id == $anggota->id ? 'selected' : '' }}>{{ $anggota->nama_anggota }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="ota_id" class="form-label">ota</label>
                <select class="form-select" id="ota_id" name="ota_id" required>
                    <option value="">Pilih ota</option>
                    @foreach ($otas as $ota)
                        <option value="{{ $ota->id }}" {{ $donasiTerima->ota_id == $ota->id ? 'selected' : '' }}>{{ $ota->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="jumlah_donasi" class="form-label">Jumlah Donasi</label>
                <input type="number" class="form-control" id="jumlah_donasi" name="jumlah_donasi" value="{{ $donasiTerima->jumlah_donasi }}" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_donasi" class="form-label">Tanggal Donasi</label>
                <input type="date" class="form-control" id="tanggal_donasi" name="tanggal_donasi" value="{{ $donasiTerima->tanggal_donasi }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
