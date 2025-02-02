<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Users extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'email',
        'password',
        'profile',
        'role',
        'code',
        'alamat',
        'tanggal_lahir',
        'isAtlet',
        'tanggal_join',
        'tingkat',
        'no_telp',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_join' => 'date',
        'isAtlet' => 'string'
    ];

    /**
     * Generate unique code for new user.
     */
    // Fungsi untuk menghasilkan kode otomatis (ERS0001, ERS0002, ...)
    public static function generateCode()
    {
        $lastUser = self::orderBy('id', 'desc')->first();
        $lastNumber = $lastUser ? (int)substr($lastUser->code, 3) : 0;
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        return "ERS{$newNumber}";
    }
    public function achievements()
    {
        return $this->hasMany(AchieveMedal::class, 'user_id');
    }


    /**
     * Boot method to set code automatically.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->code)) {
                $user->code = self::generateCode();
            }
        });
    }
}
