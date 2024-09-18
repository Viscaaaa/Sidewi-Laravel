<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_admindesa extends Model

{
    use HasFactory;

    protected $table = 'tb_admindesa';

    protected $fillable = [
        'tb_desa_wisatas_id',
        'tb_akun_id'

    ];

    public function DesaWisata()
    {
        return $this->belongsTo(DesaWisata::class, 'tb_desa_wisatas_id');
    }

    public function akun()
    {
        return $this->belongsTo(akun::class, 'tb_akun_id');
    }
}
