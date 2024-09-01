<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinasiWisata extends Model
{
    use HasFactory;

    protected $table = 'tb_destinasi_wisatas';

    public function desaWisata()
    {
        return $this->belongsTo(DesaWisata::class, 'tb_desa_wisatas_id');
    }

    public function assetDesa()
    {
        return $this->hasMany(tb_assetdestinasi::class);
    }
}
