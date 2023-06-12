@extends('layouts.app')

@section('content')
    <h1>Data Otas - Detail</h1>

    <div class="card">
        <div class="card-header">
            Detail Otas
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $otas->id }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $otas->nama }}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td>{{ $otas->pekerjaan }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $otas->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Nomor HP</th>
                        <td>{{ $otas->nomor_hp }}</td>
                    </tr>
                    <tr>
                        <th>Anggota ID</th>
                        <td>{{ $otas->anggota->nama_anggota }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
