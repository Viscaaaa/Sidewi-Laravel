<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_admindesa extends Model
{
    use HasFactory;
    public function DesaWisata()
    {
        return $this->belongsTo(DesaWisata::class);
    }

    public function akun()
    {
        return $this->belongsTo(akun::class);
    }
}
