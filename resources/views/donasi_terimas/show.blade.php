<!-- resources/views/donasi_terimas/show.blade.php -->

@extends('layouts.app')
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <h1>Detail Donasi Terima</h1>

        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $donasiTerima->id }}</td>
                </tr>
                <tr>
                    <th>OTA ID</th>
                    <td>{{ $donasiTerima->ota_id }}</td>
                </tr>
                <tr>
                    <th>Jumlah Donasi</th>
                    <td class="keterangan" title="Jumlah beras dalam bentuk Ton"> {{ $donasiTerima->jumlah_donasi }} <sup><i style="color: rgb(201, 122, 122)" class="bi bi-info-circle"></i></sup></td>
                </tr>                
                <tr>
                    <th>Tanggal Donasi</th>
                    <td>{{ $donasiTerima->tanggal_donasi }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
