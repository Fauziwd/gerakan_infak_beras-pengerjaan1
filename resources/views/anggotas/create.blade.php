@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Anggota Baru</h1>
        <form action="{{ route('anggotas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_anggota">Nama Anggota</label>
                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telepon">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="menikah">Menikah</option>
                    <option value="belum">Belum Menikah</option>
                    <option value="janda">Janda</option>
                    <option value="duda">Duda</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
            </div>
            <div class="form-group">
                <label for="komunitas_diikuti">Komunitas di Ikuti</label>
                <input type="text" class="form-control" id="komunitas_diikuti" name="komunitas_diikuti">
            </div>
            <div class="form-group">
                <label for="tentang_paskas">Tentang Paskas</label>
                <input type="text" class="form-control" id="tentang_paskas" name="tentang_paskas">
            </div>
            <div class="form-group">
                <label for="kesanggupan">Kesanggupan</label>
                <input type="text" class="form-control" id="kesanggupan" name="kesanggupan">
            </div>
            <div class="form-group">
                <label for="harapan">Harapan</label>
                <input type="text" class="form-control" id="harapan" name="harapan">
            </div>
            <div class="form-group">
                <label for="seksi_paskas">Seksi Paskas</label>
                <select class="form-control" id="seksi_paskas" name="seksi_paskas">
                    <option value="cs">Customer Service</option>
                    <option value="mkp">Media Konten Publikasi</option>
                    <option value="keuangan">Keuangan</option>
                    <option value="fundraising">Fundraising</option>
                    <option value="sdm">Sumber Daya Manusia</option>
                    <option value="support">Tim Support Program</option>
                    <option value="distributor">Distribusi Infaq Beras</option>
                </select>
            </div>
            <!-- Tambahkan kolom lain yang diperlukan di sini -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
