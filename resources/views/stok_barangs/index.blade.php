@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Daftar Stok Barang</h5>
                        <a href="{{ route('stok_barangs.create') }}" class="btn btn-primary btn-sm">Tambah Stok Barang</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Donasi Terima ID</th>
                                    <th>Donasi Penyaluran ID</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stokBarangs as $stokBarang)
                                    <tr>
                                        <td>{{ $stokBarang->id }}</td>
                                        <td>{{ $donasiTerimas->sum('jumlah_donasi') }}</td>
                                        <td>{{ $donasiPenyalurans->sum('donasi_diterima') }}</td>
                                        <td>{{ $donasiTerimas->sum('jumlah_donasi') + $donasiPenyalurans->sum('donasi_diterima')}}</td>
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
