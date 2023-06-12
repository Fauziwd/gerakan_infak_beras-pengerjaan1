<?php
  
  namespace App\Exports;
  
  use App\Models\Ota;
  use Maatwebsite\Excel\Concerns\FromCollection;
  use Maatwebsite\Excel\Concerns\WithHeadings;
    
  class OtasExport implements FromCollection, WithHeadings
  {
      /**
      * @return \Illuminate\Support\Collection
      */
      public function collection()
      {
          return Ota::with('anggota')
              ->get()
              ->sortBy(function ($ota) {
                  return $ota->anggota->nama_anggota;
              })
              ->map(function ($ota) {
                  return [
                      'ID' => $ota->id,
                      'Nama OTA' => $ota->nama,
                      'Alamat' => $ota->alamat,
                      'Fundraiser' => $ota->anggota->nama_anggota,
                      'Pekerjaan' => $ota->pekerjaan,
                      'Nomor HP' => $ota->nomor_hp
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
          return ["ID", "Nama OTA","Alamat","Fundraiser","Pekerjaan","Nomor HP"];
      }
  }
  