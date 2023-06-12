<?php
  
namespace App\Imports;
  
use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
  
class AnggotasImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Anggota([
            'nama_anggota' => $row['nama_anggota'],
            'alamat' => $row['alamat'], 
            'email' => $row['email'],    
        ]);
    }
}
