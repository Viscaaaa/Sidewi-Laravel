<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetDestinasi extends Model
{
    use HasFactory;

    protected $table = 'assetdestinasi';

    protected $fillable = [
        'destinasi_wisata_id',
        'gambar',
    ];

    public function destinasiWisata()
    {
        return $this->belongsTo(DestinasiWisata::class, 'destinasi_wisata_id');
    }
}
