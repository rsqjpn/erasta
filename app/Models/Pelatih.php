<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatih extends Model
{
    use HasFactory;

    protected $table = 'pelatih';

    protected $fillable = [
        'user_id',
        'code',
        'nama',
        'tgl_lahir',
        'profile',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
