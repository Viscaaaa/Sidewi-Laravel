<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class akun extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'tb_akun';

    protected $fillable = [
        'nama',
        'email',
        'no_telp',
        'password',
        'role',
    ];

    public function tb_admindesa()
    {
        return $this->hasOne(tb_admindesa::class, 'tb_akun_id');
    }
}
