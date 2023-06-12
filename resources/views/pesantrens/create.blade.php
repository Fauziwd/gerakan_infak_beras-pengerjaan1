<!-- resources/views/pesantrens/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Tambah Pesantren Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pesantrens.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}">
        </div>

        <div class="form-group">
            <label for="santri_putera">Jumlah Santri Putera</label>
            <input type="number" class="form-control" id="santri_putera" name="jumlah_santri_putera" value="{{ old('santri_putera') }}">
        </div>

        <div class="form-group">
            <label for="santri_puteri">Jumlah Santri Puteri</label>
            <input type="number" class="form-control" id="santri_puteri" name="jumlah_santri_puteri" value="{{ old('santri_puteri') }}">
        </div>

        <div class="form-group">
            <label for="muallim">Jumlah Muallim</label>
            <input type="number" class="form-control" id="muallim" name="jumlah_muallim" value="{{ old('muallim') }}">
        </div>

        <div class="form-group">
            <label for="jatah_beras">Jatah Beras</label>
            <input type="number" class="form-control" id="jatah_beras" name="jatah_beras" value="{{ old('jatah_beras') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
