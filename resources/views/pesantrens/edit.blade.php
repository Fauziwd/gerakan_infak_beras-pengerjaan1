@extends('layouts.app')

@section('content')
    <h1>Edit Data Pesantren</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pesantrens.update', $pesantren->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $pesantren->nama }}">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $pesantren->alamat }}">
        </div>

        <div class="form-group">
            <label for="jumlah_santri_putera">Jumlah Santri Putera</label>
            <input type="number" class="form-control" id="jumlah_santri_putera" name="jumlah_santri_putera" value="{{ $pesantren->jumlah_santri_putera }}">
        </div>

        <div class="form-group">
            <label for="jumlah_santri_puteri">Jumlah Santri Puteri</label>
            <input type="number" class="form-control" id="jumlah_santri_puteri" name="jumlah_santri_puteri" value="{{ $pesantren->jumlah_santri_puteri }}">
        </div>

        <div class="form-group">
            <label for="jumlah_muallim">Jumlah Muallim</label>
            <input type="number" class="form-control" id="jumlah_muallim" name="jumlah_muallim" value="{{ $pesantren->jumlah_muallim }}">
        </div>

        <div class="form-group">
            <label for="jatah_beras">Jatah Beras</label>
            <input type="number" class="form-control" id="jatah_beras" name="jatah_beras" value="{{ $pesantren->jatah_beras }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
