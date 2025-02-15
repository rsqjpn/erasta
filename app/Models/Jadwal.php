<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';

    protected $fillable = ['tanggal', 'id_pelatih', 'id_tempat_latihan'];

    public function pelatih()
    {
        return $this->belongsTo(Pelatih::class, 'id_pelatih');
    }

    public function tempatLatihan()
    {
        return $this->belongsTo(TempatLatihan::class, 'id_tempat_latihan');
    }
}
