@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detail Donasi Penyaluran</div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Anggota</th>
                                <td>{{ $donasiPenyaluran->anggota->nama_anggota }}</td>
                            </tr>
                            <tr>
                                <th>Pesantren</th>
                                <td>{{ $donasiPenyaluran->pesantren->nama }}</td>
                            </tr>
                            <tr>
                                <th>Donasi Diterima</th>
                                <td>{{ $donasiPenyaluran->donasi_diterima }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Penyaluran</th>
                                <td>{{ $donasiPenyaluran->tanggal_penyaluran }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
