<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DestinasiWisata;
use App\Models\DesaWisata;
use Illuminate\Support\Str;

class AdminDesaController extends Controller
{
    public function showListDestinasi($id)
    {
        $desaWisata = DesaWisata::findOrFail($id);
        $destinasiWisata = DestinasiWisata::where('tb_desa_wisatas_id', $desaWisata->id)->get();

        return view('pages.admindesa', compact('desaWisata', 'destinasiWisata'));
    }
}
