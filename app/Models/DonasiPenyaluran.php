<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonasiPenyaluran extends Model
{
    protected $table = 'donasi_penyalurans';
    protected $fillable = [
        'anggota_id',
        'pesantren_id',
        'donasi_diterima',
        'tanggal_penyaluran',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    public function pesantren()
    {
        return $this->belongsTo(Pesantren::class, 'pesantren_id');
    }
}
