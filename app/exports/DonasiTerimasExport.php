<?php
  
  namespace App\Exports;
  
  use App\Models\DonasiTerima;
  use Maatwebsite\Excel\Concerns\FromCollection;
  use Maatwebsite\Excel\Concerns\WithHeadings;
    
  class DonasiTerimasExport implements FromCollection, WithHeadings
  {
      /**
      * @return \Illuminate\Support\Collection
      */
      public function collection()
      {
          $donasiTerimas = DonasiTerima::with(['anggota', 'ota'])
              ->get()
              ->sortBy(function ($donasiTerima) {
                  return $donasiTerima->anggota->nama_anggota;
              })
              ->sortBy(function ($donasiTerima) {
                  return $donasiTerima->ota->nama;
              });
  
          $no = 1;
          return $donasiTerimas->map(function ($donasiTerima) use (&$no) {
              return [
                  'No' => $no++,
                  'Donatur' => $donasiTerima->ota->nama,
                  'Penanggung Jawab' => $donasiTerima->anggota->nama_anggota,
                  'Jumlah Donasi' => $donasiTerima->jumlah_donasi,
                  'Tanggal Donasi' => $donasiTerima->tanggal_donasi     
              ];
          });
      }
    
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function headings(): array
      {
          return ["No", "Donatur", "Penanggung Jawab", "Jumlah Donasi", "Tanggal Donasi"];
      }
  }
  