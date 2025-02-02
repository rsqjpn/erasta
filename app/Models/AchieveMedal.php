<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchieveMedal extends Model
{
    use HasFactory;

    protected $table = 'achieve_medals';
    protected $fillable = ['user_id', 'medal_id', 'achieved_at','deskripsi','code'];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function medal()
    {
        return $this->belongsTo(Medal::class, 'medal_id');
    }
}
