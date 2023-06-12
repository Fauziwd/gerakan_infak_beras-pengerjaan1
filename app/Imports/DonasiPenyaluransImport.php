<?php
  
  namespace App\Imports;
  
  use App\Models\DonasiPenyaluran;
  use App\Models\Anggota;
  use App\Models\Pesantren;
  use Maatwebsite\Excel\Concerns\ToModel;
  use Maatwebsite\Excel\Concerns\WithHeadingRow;
    
  class DonasiPenyaluransImport implements ToModel, WithHeadingRow
  {
      /**
      * @param array $row
      *
      * @return \Illuminate\Database\Eloquent\Model|null
      */
      public function model(array $row)
      {   
          $anggota = Anggota::where('nama_anggota', $row['penanggung_jawab'])->first();
          $pesantren = Pesantren::where('nama', $row['pesantren_mitra'])->first();

          return new DonasiPenyaluran([
              'pesantren_id' => $pesantren ? $pesantren->id : null,
              'anggota_id' => $anggota ? $anggota->id : null,
              'donasi_diterima' => $row['donasi_disalurkan'],
              'tanggal_penyaluran' => $row['tanggal_penyaluran']
          ]);
      }
  }
  