<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medal extends Model
{
    use HasFactory;

    protected $table = 'medals';
    protected $fillable = ['name', 'picture', 'type'];

    public function achieveMedals()
    {
        return $this->hasMany(AchieveMedal::class, 'medal_id');
    }
}
