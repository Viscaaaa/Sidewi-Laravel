<?php

namespace App\Http\Controllers;

use App\Models\DesaWisata;
use Illuminate\Http\Request;

class DesaWisataController extends Controller
{
    public function getDesa()
    {
        $desaWisata = DesaWisata::all();
        return view('pages.desa', compact('desaWisata'));
    }


    public function showLanding()
    {
        $desaWisata = DesaWisata::all();
        return view('pages.landing', compact('desaWisata'));
    }

    // public function showDesa($slug)
    // {
    //     $desaWisata = DesaWisata::where('slug', $slug)->with('destinasi')->firstOrFail();
    //     return view('pages.detail', compact('desaWisata'));
    // }
    // public function showDesa($slug)
    // {
    //     $desaWisata = DesaWisata::where('slug', $slug)->firstOrFail();
    //     return view('pages.detail', compact('desaWisata'));
    // }


    public function showDesa($slug)
    {
        $desaWisata = DesaWisata::where('slug', $slug)
            ->with('destinasi') // Memuat relasi destinasi
            ->firstOrFail();
        return view('pages.detaildesa', compact('desaWisata'));
    }
}
