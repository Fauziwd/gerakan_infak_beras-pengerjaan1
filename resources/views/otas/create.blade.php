<!-- resources/views/otas/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Tambah Otas</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('otas.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
        </div>

        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}">
        </div>

        <div class="form-group">
            <label for="nomor_hp">Nomor HP</label>
            <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}">
        </div>

        <div class="form-group">
            <label for="anggota_id">Fundraiser</label>
            <select class="form-control" id="anggota_id" name="anggota_id">
                @foreach($anggotas as $id => $nama_anggota)
                    <option value="{{ $id }}">{{ $nama_anggota }}</option>
                @endforeach
            </select>
        </div>
        
        

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
