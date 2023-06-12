<?php
  
  namespace App\Imports;
  
  use App\Models\Ota;
  use App\Models\Anggota;
  use Maatwebsite\Excel\Concerns\ToModel;
  use Maatwebsite\Excel\Concerns\WithHeadingRow;
    
  class OtasImport implements ToModel, WithHeadingRow
  {
      /**
      * @param array $row
      *
      * @return \Illuminate\Database\Eloquent\Model|null
      */
      public function model(array $row)
      {
          $anggota = Anggota::where('nama_anggota', $row['fundraiser'])->first();
          
          return new Ota([
              'nama' => $row['nama_ota'],
              'alamat' => $row['alamat'],
              'pekerjaan' => $row['pekerjaan'],
              'nomor_hp' => $row['nomor_hp'],
              'anggota_id' => $anggota ? $anggota->id : null
          ]);
      }
  }
  