<?php

namespace App\Imports;
  
use App\Models\Pesantren;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
  
class PesantrensImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pesantren([
            'nama' => $row['nama'],
            'alamat' => $row['alamat'],
            'jumlah_santri_putera' => $row['jumlah_santri_putra'],
            'jumlah_santri_puteri' => $row['jumlah_santri_putri'],
            'jumlah_muallim' => $row['jumlah_muallim'],
            'jatah_beras' => $row['jatah_beras'],
        ]);
    }
}
