<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DesaWisata>
 */
class DesaWisataFactory extends Factory

{
    protected $model = \App\Models\DesaWisata::class;

    public function definition()
    {
        return [
            'gambar' => "assets/img/landing1.jpg",
            'alamat' => $this->faker->address,
            'nama' => $this->faker->unique()->word,
            'deskripsi' => $this->faker->paragraph,
            'maps' => $this->faker->url,
            'kategori' => $this->faker->randomElement(['rintisan', 'berkembang', 'maju', 'mandiri']),
            'kabupaten' => $this->faker->randomElement(['Badung', 'Bangli', 'Buleleng', 'Denpasar', 'Gianyar', 'Jembrana', 'Karangasem', 'Klungkung', 'Tabanan']),
            'slug' => Str::slug($this->faker->unique()->word),
        ];
    }
}
