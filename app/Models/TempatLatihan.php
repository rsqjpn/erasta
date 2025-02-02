<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatLatihan extends Model
{
    use HasFactory;

    protected $table = 'tempat_latihan'; // Pastikan sesuai dengan nama tabel di database

    protected $fillable = [
        'nama',
        'alamat',
        'peta',
        'deskripsi',
        'jam_buka',
        'jam_tutup',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true; // Pastikan timestamps diaktifkan
}
