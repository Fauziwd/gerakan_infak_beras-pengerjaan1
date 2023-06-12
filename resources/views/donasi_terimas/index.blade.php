<!-- resources/views/donasi_terimas/index.blade.php -->

@extends('layouts.app')
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <h1>Daftar Donasi Terima</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="float-end">
            <div class="d-inline-block">
                <form action="{{ route('donasi_terimas.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                      <label class="input-group-text btn btn-success rounded" for="fileInput"><i class="bi bi-cloud-upload"></i>&nbsp; Import</label>
                      <input type="file" name="file" class="form-control d-none" id="fileInput">
                    </div>
                  </form>     
                </div>
                <div class="d-inline-block">
                    <a class="btn btn-warning" href="{{ route('donasi_terimas.export') }}"><i class="bi bi-box-arrow-in-down"></i>&nbsp; Export</a>
                </div>
            </div>
            <a href="{{ route('donasi_terimas.create') }}" class="btn btn-outline-primary"><i class="bi bi-person-plus-fill"></i>&nbsp; Tambah Donasi Terima</a>
            <form action="{{ route('donasi_terimas.search') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Cari...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Donatur</th>
                                    <th>
                    <span class="keterangan" data-toggle="tooltip" data-placement="top" title="Penanggung Jawab / Anggota">
                    Penerima<sup><i style="color: rgb(201, 132, 132)" class="bi bi-info-circle"></i></sup>
                    </span>
                  </th>
                    <th>Jumlah Donasi</th>
                    <th>Tanggal Donasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donasiTerimas as $donasiTerima)
                    <tr>
                        <td>{{ $donasiTerima->id}}</td>
                        <td>{{ $donasiTerima->ota->nama }}</td>
                        <td>{{ $donasiTerima->anggota->nama_anggota }}</td>
                        <td>{{ $donasiTerima->jumlah_donasi }}</td>
                        <td>{{ $donasiTerima->tanggal_donasi }}</td>
                        <td>
                            <a href="{{ route('donasi_terimas.show', $donasiTerima->id) }}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('donasi_terimas.edit', $donasiTerima->id) }}" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('donasi_terimas.destroy', $donasiTerima->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus donasi terima ini?')"><i class="bi bi-trash3"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
