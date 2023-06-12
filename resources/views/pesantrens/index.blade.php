@extends('layouts.app')
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">

@section('content')
    <h1>Data Pesantren</h1>
    <div class="float-end">
        <div class="d-inline-block">
            <form action="{{ route('pesantrens.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                  <label class="input-group-text btn btn-success rounded" for="fileInput"><i class="bi bi-cloud-upload"></i> Import</label>
                  <input type="file" name="file" class="form-control d-none" id="fileInput">
                </div>
              </form>                                   
        </div>
        <div class="d-inline-block">
            <a class="btn btn-warning" href="{{ route('pesantrens.export') }}"><i class="bi bi-box-arrow-in-down"></i> Export</a>
        </div>
    </div>
    <a href="{{ route('pesantrens.create') }}" class="btn btn-primary mb-2"><i class="bi bi-person-plus-fill"></i> Tambah Pesantern</a>
    <form action="{{ route('pesantrens.search') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Cari Pesantren" aria-label="Cari Pesantren">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
    

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pesantren</th>
                <th>Alamat</th>
                <th>Jumlah Santri</th>
                <th>Jumlah Muallim</th>
                <th>
                    <span class="keterangan" data-toggle="tooltip" data-placement="top" title="Jumlah beras dalam bentuk Ton">
                    Jatah Beras<sup><i style="color: rgb(201, 122, 122)" class="bi bi-info-circle"></i></sup>
                    </span>
                  </th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesantrens as $pesantren)
                <tr>
                    <td>{{ $pesantren->id }}</td>
                    <td>{{ $pesantren->nama }}</td>
                    <td>{{ $pesantren->alamat }}</td>
                    <td>{{ $pesantren->jumlah_santri_putera + $pesantren->jumlah_santri_puteri }} </td>
                    <td>{{ $pesantren->jumlah_muallim }}</td>
                    <td>{{ $pesantren->jatah_beras }}</td>
                    <td>
                        <a href="{{ route('pesantrens.show', $pesantren->id) }}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('pesantrens.edit', $pesantren->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('pesantrens.destroy', $pesantren->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash3"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
