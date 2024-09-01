<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_assetdestinasi extends Model
{
    use HasFactory;

    public function destinasiDesa()
    {
        return $this->belongsTo(DestinasiWisata::class);
    }
}
