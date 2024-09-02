<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DestinasiWisata;
use App\Models\DesaWisata;
use Illuminate\Support\Str;

class DestinasiWisataController extends Controller
{
    // public function showDestinasi()
    // {
    //     $destinasiWisatas = DestinasiWisata::all();
    //     return view('pages.admindesa', compact('destinasiWisatas'));
    // }


    public function index($desaWisataId)
    {
        $desaWisata = DesaWisata::findOrFail($desaWisataId);
        $destinasiWisata = $desaWisata->destinasi;

        return view('pages.admindesa', compact('desaWisata', 'destinasiWisata'));
    }



    public function create($desaWisataId)
    {
        $desaWisata = DesaWisata::findOrFail($desaWisataId);
        return view('pages.createdestinasi', compact('desaWisata'));
    }


    public function store(Request $request, $desaWisataId)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image',
        ]);

        $desaWisata = DesaWisata::findOrFail($desaWisataId);
        $path = $request->file('gambar')->store('images', 'public');

        DestinasiWisata::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $path,
            'slug' => Str::slug($request->nama),
            'tb_desa_wisatas_id' => $desaWisata->id,
        ]);

        return redirect()->route('destination.index', $desaWisata->id)->with('success', 'Destinasi wisata berhasil ditambahkan');
    }

    public function edit($desaWisataId, $id)
    {
        $desaWisata = DesaWisata::findOrFail($desaWisataId);
        $destinasiWisata = DestinasiWisata::findOrFail($id);

        return view('pages.editdestinasi', compact('desaWisata', 'destinasiWisata'));
    }

    public function update(Request $request, $desaWisataId, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'gambar' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $destinasiWisata = DestinasiWisata::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images', 'public');
            $destinasiWisata->gambar = $gambarPath;
        }

        $destinasiWisata->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'slug' => Str::slug($request->nama),
        ]);

        return redirect()->route('destination.index', $desaWisataId)
            ->with('success', 'Destinasi Wisata berhasil diperbarui.');
    }


    public function show($id)
    {
        $destinasiWisata = DestinasiWisata::findOrFail($id);
        return view('destinasi-wisata.show', compact('destinasiWisata'));
    }






    public function destroy($desaWisataId, $id)
    {
        $desaWisata = DesaWisata::findOrFail($desaWisataId);
        $destinasiWisata = DestinasiWisata::where('tb_desa_wisatas_id', $desaWisataId)->findOrFail($id);

        $destinasiWisata->delete();

        return redirect()->route('destination.index', $desaWisata->id)->with('success', 'Destinasi wisata berhasil dihapus');
    }

    public function showListDestinasi($id)
    {
        $desaWisata = DesaWisata::where('id', $id)
            ->with('destinasi') // Memuat relasi destinasi
            ->firstOrFail();

        $destinasiWisatas = $desaWisata->destinasi;
        return view('pages.admindesa', compact('desaWisata', 'destinasiWisatas'));
    }

    // public function getIdDesa($id)
    // {
    //     $desaWisata = DesaWisata::where('id', $id)
    //         ->firstOrFail();
    //     return view('pages.createdestinasi', compact('desaWisata'));
    // }
}
