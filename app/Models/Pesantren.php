<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesantren extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'jumlah_santri_putera',
        'jumlah_santri_puteri',
        'jumlah_muallim',
        'jatah_beras',
    ];

    // Tambahkan relasi atau metode lain yang diperlukan di sini
}
