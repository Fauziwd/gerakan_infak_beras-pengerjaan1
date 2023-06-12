@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Anggota</h1>
        <div class="float-end">
            <div class="d-inline-block">
                <form action="{{ route('anggotas.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                      <label class="input-group-text btn btn-success rounded" for="fileInput"><i class="bi bi-cloud-upload"></i> Import</label>
                      <input type="file" name="file" class="form-control d-none" id="fileInput">
                    </div>
                  </form>                                   
            </div>
            <div class="d-inline-block">
                <a class="btn btn-warning" href="{{ route('anggotas.export') }}"><i class="bi bi-box-arrow-in-down"></i> Export</a>
            </div>
        </div>
        <a href="{{ route('anggotas.create') }}" class="btn btn-primary mb-2"><i class="bi bi-person-plus-fill"></i> Tambah Anggota</a>
        <form action="{{ route('anggotas.search') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Cari anggota..." aria-label="Cari anggota" aria-describedby="button-search">
                <button class="btn btn-primary" type="submit" id="button-search">Cari</button>
            </div>
        </form>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($anggotas as $anggota)
                <tr>
                    <td>{{ $anggota->id }}</td>
                    <td>{{ $anggota->nama_anggota }}</td>
                    <td>{{ $anggota->alamat }}</td>
                    <td>
                        <a href="{{ route('anggotas.show', $anggota->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('anggotas.edit', $anggota->id) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('anggotas.destroy', $anggota->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')"><i class="bi bi-trash3"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
