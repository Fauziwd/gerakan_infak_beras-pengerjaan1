<?php 

namespace App\Exports;
  
use App\Models\Pesantren;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class PesantrensExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pesantren::select("nama", "alamat", "jumlah_santri_putera", "jumlah_santri_puteri", "jumlah_muallim", "jatah_beras")->get();    
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["Nama", "Alamat", "Jumlah Santri Putra", "Jumlah Santri Putri", "Jumlah Muallim", "Jatah Beras"];
    }
}
