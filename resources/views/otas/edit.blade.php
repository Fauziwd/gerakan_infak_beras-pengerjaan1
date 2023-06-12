@extends('layouts.app')

@section('content')
    <h1>Edit Data Otas</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('otas.update', $otas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $otas->nama }}">
        </div>

        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $otas->pekerjaan }}">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $otas->alamat }}">
        </div>

        <div class="form-group">
            <label for="nomor_hp">Nomor HP</label>
            <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="{{ $otas->nomor_hp }}">
        </div>

        <div class="form-group">
            <label for="anggota_id">Anggota ID</label>
            <select class="form-control" id="anggota_id" name="anggota_id">
                @foreach($anggotas as $anggota)            
                    <option value="{{ $anggota->id }}" {{ $anggota->id == $otas->anggota_id ? 'selected' : '' }}>
                        {{ $anggota->nama_anggota }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
