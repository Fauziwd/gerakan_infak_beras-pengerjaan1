<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ota extends Model
{
    protected $table = 'otas';
    
    protected $fillable = [
        'nama',
        'pekerjaan',
        'alamat',
        'nomor_hp',
        'anggota_id',
    ];
    
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }
}
