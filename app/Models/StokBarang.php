<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokBarang extends Model
{
    protected $table = 'stok_barangs';
    protected $fillable = ['donasi_terima_id', 'donasi_penyaluran_id', 'stok'];

    public function donasiTerima()
    {
        return $this->belongsTo(DonasiTerima::class, 'donasi_terima_id');
    }

    public function donasiPenyaluran()
    {
        return $this->belongsTo(DonasiPenyaluran::class, 'donasi_penyaluran_id');
    }
}
