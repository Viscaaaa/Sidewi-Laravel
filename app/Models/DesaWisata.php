<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesaWisata extends Model
{
    use HasFactory;

    protected $table = 'tb_desa_wisatas';

    public function destinasi()
    {
        return $this->hasMany(DestinasiWisata::class);
    }

    public function adminDesa()
    {
        return $this->hasOne(tb_admindesa::class);
    }
}
