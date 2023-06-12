@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Otas</h1>
    <div class="float-end">
        <div class="d-inline-block">
    <form action="{{ route('otas.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <label class="input-group-text btn btn-success rounded" for="fileInput"><i class="bi bi-cloud-upload"></i> Import</label>
            <input type="file" name="file" class="form-control d-none" id="fileInput">
          </div>
        </form>   
</div>
<div class="d-inline-block">
    <a class="btn btn-warning" href="{{ route('otas.export') }}"><i class="bi bi-box-arrow-in-down"></i> Export</a>
</div>
    </div>
<a href="{{ route('otas.create') }}" class="btn btn-primary mb-2"><i class="bi bi-person-plus-fill"></i> Tambah Anggota</a>
<form action="{{ route('otas.search') }}" method="GET">
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="search" placeholder="Cari...">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
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
                <th>Nama</th>
                <th>Fundraiser</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($otas as $otasItem)
                <tr>
                    <td>{{ $otasItem->id }}</td>
                    <td>{{ $otasItem->nama }}</td>
                    <td>{{ $otasItem->anggota->nama_anggota }}</td>
                    <td>
                        <a href="{{ route('otas.show', $otasItem->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('otas.edit', $otasItem->id) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('otas.destroy', $otasItem->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash3"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
