@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header">Daftar Donasi Penyaluran</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                           
                        </div>
                        <div >
                            <form  action="{{ route('donasi_penyalurans.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group">
                                   
                                    <input type="file" name="file" class="form-control d-none" id="fileInput">
                                </div>
                            </form>
                            <label class="input-group-text btn btn-success rounded" for="fileInput"><i class="bi bi-cloud-upload"></i>&nbsp; Import</label>
                            <a class="btn btn-warning" href="{{ route('donasi_penyalurans.export') }}"><i class="bi bi-box-arrow-in-down"></i>&nbsp; Export</a>
                        </div>
                    </div>

                    <div class="mb-3">
                        <a href="{{ route('donasi_penyalurans.create') }}" class="btn btn-outline-primary mb-2"><i class="bi bi-person-plus-fill"></i>&nbsp; Tambah Donasi Terima</a>
                    <form action="{{ route('donasi_penyalurans.search') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Cari anggota..." aria-label="Cari anggota" aria-describedby="button-search">
                            <button class="btn btn-primary" type="submit" id="button-search">Cari</button>
                        </div>
                    </form>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Anggota</th>
                                <th>Pesantren</th>
                                <th>Donasi Diterima</th>
                                <th>Tanggal Penyaluran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donasiPenyalurans as $donasiPenyaluran)
                            <tr>
                                <td>{{ $donasiPenyaluran->id }}</td>
                                <td>{{ $donasiPenyaluran->anggota->nama_anggota }}</td>
                                <td>{{ $donasiPenyaluran->pesantren->nama }}</td>
                                <td>{{ $donasiPenyaluran->donasi_diterima }}</td>
                                <td>{{ $donasiPenyaluran->tanggal_penyaluran }}</td>
                                <td>
                                    <a href="{{ route('donasi_penyalurans.show', $donasiPenyaluran->id) }}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('donasi_penyalurans.edit', $donasiPenyaluran->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('donasi_penyalurans.destroy', $donasiPenyaluran->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus donasi penyaluran ini?')"><i class="bi bi-trash3"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
