<?php
  
  namespace App\Exports;
  
  use App\Models\DonasiPenyaluran;
  use Maatwebsite\Excel\Concerns\FromCollection;
  use Maatwebsite\Excel\Concerns\WithHeadings;
    
  class DonasiPenyaluransExport implements FromCollection, WithHeadings
  {
      /**
      * @return \Illuminate\Support\Collection
      */
      public function collection()
      {
          $donasiPenyalurans = DonasiPenyaluran::with(['anggota', 'pesantren'])
              ->get()
              ->sortBy(function ($donasiPenyaluran) {
                  return $donasiPenyaluran->anggota->nama_anggota;
              })
              ->sortBy(function ($donasiPenyaluran) {
                  return $donasiPenyaluran->pesantren->nama;
              });
  
          $no = 1;
          return $donasiPenyalurans->map(function ($donasiPenyaluran) use (&$no) {
              return [
                  'No' => $no++,
                  'Penanggung Jawab' => $donasiPenyaluran->anggota->nama_anggota,
                  'Pesantren Mitra' => $donasiPenyaluran->pesantren->nama,
                  'Donasi Disalurkan' => $donasiPenyaluran->donasi_diterima,
                  'Tanggal Penyaluran' => $donasiPenyaluran->tanggal_penyaluran     
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
          return ["No", "Penanggung Jawab", "Pesantren Mitra", "Donasi Disalurkan", "Tanggal Penyaluran"];
      }
  }
  