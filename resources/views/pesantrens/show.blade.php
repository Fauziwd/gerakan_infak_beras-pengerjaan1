@extends('layouts.app')

@section('content')
    <h1>Detail Pesantren</h1>

    <table class="table">
        <tr>
            <th>Nama</th>
            <td>{{ $pesantren->nama }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $pesantren->alamat }}</td>
        </tr>
        <tr>
            <th>Jumlah Santri Putera</th>
            <td>{{ $pesantren->jumlah_santri_putera }}</td>
        </tr>
        <tr>
            <th>Jumlah Santri Puteri</th>
            <td>{{ $pesantren->jumlah_santri_puteri }}</td>
        </tr>
        <tr>
            <th>Jumlah Muallim</th>
            <td>{{ $pesantren->jumlah_muallim }}</td>
        </tr>
        <tr>
            <th>Jatah Beras</th>
            <td>{{ $pesantren->jatah_beras }}</td>
        </tr>
    </table>

    <a href="{{ route('pesantrens.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
