<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'nama_anggota',
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
        'seksi_paskas',
        // tambahkan kolom lain yang diperlukan di sini
    ];
}
