<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DestinasiWisata extends Model
{
    use HasFactory;

    protected $table = 'tb_destinasi_wisatas';

    protected $fillable = [
        'tb_desa_wisatas_id',
        'nama',
        'deskripsi',
        'gambar',
        'slug',
    ];

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function desaWisata()
    {
        return $this->belongsTo(DesaWisata::class, 'tb_desa_wisatas_id');
    }

    public function assetDestinasi()
    {
        return $this->hasMany(AssetDestinasi::class);
    }
}
