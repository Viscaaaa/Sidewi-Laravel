<?php

namespace Database\Seeders;

use App\Models\DesaWisata;
use App\Models\DestinasiWisata;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {

        // DesaWisata::factory(10)
        //     ->has(\App\Models\DestinasiWisata::factory()->count(3), 'destinasi')
        //     ->create();

        DesaWisata::factory(10)->create()->each(function ($desaWisata) {

            DestinasiWisata::factory(3)->create([
                'tb_desa_wisatas_id' => $desaWisata->id,
            ]);
        });
    }
}
