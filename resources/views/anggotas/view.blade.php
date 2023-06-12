@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Anggota</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $anggota->id }}</td>
                </tr>
                <tr>
                    <th>Nama Anggota</th>
                    <td>{{ $anggota->nama_anggota }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $anggota->alamat }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $anggota->email }}</td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td> @if ($anggota->telepon)
                        {{ $anggota->telepon }}
                    @else
                        <span class="text-danger">Silahkan diisi lewat tautan <a href="{{ route('anggotas.edit', $anggota->id) }}">edit</a></span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td> @if ($anggota->tanggal_lahir)
                        {{ $anggota->tanggal_lahir }}
                    @else
                        <span class="text-danger">Silahkan diisi lewat tautan <a href="{{ route('anggotas.edit', $anggota->id) }}">edit</a></span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Tempat Lahir</th>
                    <td> @if ($anggota->tempat_lahir)
                        {{ $anggota->tempat_lahir }}
                    @else
                        <span class="text-danger">Silahkan diisi lewat tautan <a href="{{ route('anggotas.edit', $anggota->id) }}">edit</a></span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td> @if ($anggota->jenis_kelamin)
                        @if ($anggota->jenis_kelamin == 'L')
                            Laki-Laki
                        @elseif ($anggota->jenis_kelamin == 'P')
                            Perempuan
                        @else
                            Tidak Valid
                        @endif
                    @else
                        <span class="text-danger">Silahkan diisi lewat tautan <a href="{{ route('anggotas.edit', $anggota->id) }}">edit</a></span>
                    @endif
                    </td>
                </tr>
                <tr>
                    <th>Seksi Paskas</th>
                    <td> @if ($anggota->seksi_paskas)
                        @if ($anggota->seksi_paskas == 'cs')
                            Customer Service
                        @elseif ($anggota->seksi_paskas == 'mkp')
                            Media Konten Publikasi
                        @elseif ($anggota->seksi_paskas == 'keuangan')
                            Keuangan
                        @elseif ($anggota->seksi_paskas == 'fundraising')
                            Fundraising
                        @elseif ($anggota->seksi_paskas == 'sdm')
                            Sumber Daya Manusia
                        @elseif ($anggota->seksi_paskas == 'support')
                            Tim Support Program
                        @elseif ($anggota->seksi_paskas == 'distributor')
                            Distribusi Infaq Beras
                        @else
                            Tidak Valid
                        @endif
                    @else
                        <span class="text-danger">Silahkan diisi lewat tautan <a href="{{ route('anggotas.edit', $anggota->id) }}">edit</a></span>
                    @endif
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td> @if ($anggota->status)
                        {{ $anggota->status }}
                    @else
                        <span class="text-danger">Silahkan diisi lewat tautan <a href="{{ route('anggotas.edit', $anggota->id) }}">edit</a></span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td> @if ($anggota->pekerjaan)
                        {{ $anggota->pekerjaan }}
                    @else
                        <span class="text-danger">Silahkan diisi lewat tautan <a href="{{ route('anggotas.edit', $anggota->id) }}">edit</a></span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Komunitas yang Diikuti</th>
                    <td> @if ($anggota->komunitas_diikuti)
                        {{ $anggota->komunitas_diikuti }}
                    @else
                        <span class="text-danger">Silahkan diisi lewat tautan <a href="{{ route('anggotas.edit', $anggota->id) }}">edit</a></span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Tentang PASKAS</th>
                    <td> @if ($anggota->tentang_paskas)
                        {{ $anggota->tentang_paskas }}
                    @else
                        <span class="text-danger">Silahkan diisi lewat tautan <a href="{{ route('anggotas.edit', $anggota->id) }}">edit</a></span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Kesanggupan</th>
                    <td> @if ($anggota->kesanggupan)
                        {{ $anggota->kesanggupan }}
                    @else
                        <span class="text-danger">Silahkan diisi lewat tautan <a href="{{ route('anggotas.edit', $anggota->id) }}">edit</a></span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Harapan</th>
                    <td> @if ($anggota->harapan)
                        {{ $anggota->harapan }}
                    @else
                        <span class="text-danger">Silahkan diisi lewat tautan <a href="{{ route('anggotas.edit', $anggota->id) }}">edit</a></span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
