<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\DesaWisata;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DestinasiWisata>
 */
class DestinasiWisataFactory extends Factory
{
    protected $model = \App\Models\DestinasiWisata::class;

    public function definition()
    {
        return [
            'tb_desa_wisatas_id' => DesaWisata::factory(),
            'deskripsi' => $this->faker->paragraph,
            'nama' => $this->faker->unique()->word,
            'gambar' => "assets/img/landing1.jpg",
            'slug' => Str::slug($this->faker->unique()->word),
        ];
    }
}
