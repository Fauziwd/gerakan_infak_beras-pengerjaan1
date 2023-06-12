<?php
  
  namespace App\Imports;
  
  use App\Models\DonasiTerima;
  use App\Models\Anggota;
  use App\Models\Ota;
  use Maatwebsite\Excel\Concerns\ToModel;
  use Maatwebsite\Excel\Concerns\WithHeadingRow;
    
  class DonasiTerimasImport implements ToModel, WithHeadingRow
  {
      /**
      * @param array $row
      *
      * @return \Illuminate\Database\Eloquent\Model|null
      */
      public function model(array $row)
      {   
          $ota = Ota::where('nama', $row['donatur'])->first();
          $anggota = Anggota::where('nama_anggota', $row['penanggung_jawab'])->first();
          

          return new DonasiTerima([
              'ota_id' => $ota ? $ota->id : null,
              'anggota_id' => $anggota ? $anggota->id : null,
              'jumlah_donasi' => $row['jumlah_donasi'],
              'tanggal_donasi' => $row['tanggal_donasi']
          ]);
      }
  }
  