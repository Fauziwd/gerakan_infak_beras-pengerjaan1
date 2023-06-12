<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonasiTerima extends Model
{
    protected $table = 'donasi_terimas';
    protected $fillable = ['ota_id', 'anggota_id','jumlah_donasi', 'tanggal_donasi'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    public function ota()
    {
        return $this->belongsTo(Ota::class, 'ota_id');
    }
}
