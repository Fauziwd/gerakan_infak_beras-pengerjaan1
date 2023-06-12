@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Anggota</h1>
        <form action="{{ route('anggotas.update', $anggota->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_anggota">Nama Anggota</label>
                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="{{ $anggota->nama_anggota }}" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $anggota->alamat }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $anggota->email }}" required>
            </div>
            <div class="form-group">
                <label for="telepon">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $anggota->telepon }}">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $anggota->tanggal_lahir }}">
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $anggota->tempat_lahir }}" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="L" @if($anggota->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                    <option value="P" @if($anggota->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="seksi_paskas">Seksi Paskas</label>
                <select class="form-control" id="seksi_paskas" name="seksi_paskas">
                    <option value="cs" @if($anggota->seksi_paskas == 'cs') selected @endif>Customer Service</option>
                    <option value="mkp" @if($anggota->seksi_paskas == 'mkp') selected @endif>Media Konten Publikasi</option>
                    <option value="keuangan" @if($anggota->seksi_paskas == 'keuangan') selected @endif>Keuangan</option>
                    <option value="fundraising" @if($anggota->seksi_paskas == 'fundraising') selected @endif>Fundraising</option>
                    <option value="sdm" @if($anggota->seksi_paskas == 'sdm') selected @endif>Sumber Daya Manusia</option>
                    <option value="support" @if($anggota->seksi_paskas == 'support') selected @endif>Tim Support Program</option>
                    <option value="distributor" @if($anggota->seksi_paskas == 'distributor') selected @endif>Distribusi Infaq Beras</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="menikah" @if($anggota->status == 'menikah') selected @endif>Menikah</option>
                    <option value="belum" @if($anggota->status == 'belum') selected @endif>Belum Menikah</option>
                    <option value="janda" @if($anggota->status == 'janda') selected @endif>Janda</option>
                    <option value="duda" @if($anggota->status == 'duda') selected @endif>Duda</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $anggota->pekerjaan }}">
            </div>
            <div class="form-group">
                <label for="komunitas_diikuti">Komunitas yang Diikuti</label>
                <input type="text" class="form-control" id="komunitas_diikuti" name="komunitas_diikuti" value="{{ $anggota->komunitas_diikuti }}">
            </div>
            <div class="form-group">
                <label for="tentang_paskas">Tentang PASKAS</label>
                <textarea class="form-control" id="tentang_paskas" name="tentang_paskas">{{ $anggota->tentang_paskas }}</textarea>
            </div>
            <div class="form-group">
                <label for="kesanggupan">Kesanggupan</label>
                <textarea class="form-control" id="kesanggupan" name="kesanggupan">{{ $anggota->kesanggupan }}</textarea>
            </div>
            <div class="form-group">
                <label for="harapan">Harapan</label>
                <textarea class="form-control" id="harapan" name="harapan">{{ $anggota->harapan }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
