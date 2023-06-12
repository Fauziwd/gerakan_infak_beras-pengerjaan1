<?php
  
namespace App\Exports;
  
use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class AnggotasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Anggota::select('nama_anggota',
        'alamat',
        'email',
        'telepon',
        'tanggal_lahir',
        'jenis_kelamin',
        'tempat_lahir',
        'status',
        'pekerjaan',
        'komunitas_diikuti',
        'tentang_paskas', 
        'kesanggupan',
        'harapan',
        'seksi_paskas')->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return [ 
        'Nama Anggota',
        'Alamat',
        'Email',
        'Telepon',
        'Tanggal Lahir',
        'Jenis Kelamin',
        'Tempat Lahir',
        'Status',
        'Pekerjaan',
        'Komunitas Diikuti',
        'Tentang Paskas', 
        'Kesanggupan',
        'Harapan',
        'Seksi Paskas'];
    }
}