<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DestinasiWisata;
use App\Models\DesaWisata;
use Illuminate\Support\Str;

class DestinasiWisataController extends Controller
{

    // public function create($desaWisataId)
    // {
    //     $desaWisata = DesaWisata::findOrFail($desaWisataId);
    //     return view('pages.createdestinasi', compact('desaWisata'));
    // }
    public function create($desaWisataId)
    {
        $desaWisata = DesaWisata::findOrFail($desaWisataId);
        return view('pages.createdestinasi', compact('desaWisata'));
    }



    public function store(Request $request, $desaWisataId)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
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

        return redirect()->route('admin-desa.showListDestinasi', $desaWisataId)
            ->with('success', 'Destinasi wisata berhasil ditambahkan');
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

        return redirect()->route('admin-desa.showListDestinasi', $desaWisataId)
            ->with('success', 'Destinasi Wisata berhasil diperbarui.');
    }


    public function show($id)
    {
        $destinasiWisata = DestinasiWisata::findOrFail($id);
        return view('destinasi-wisata.show', compact('destinasiWisata'));
    }


    public function destroy($id)
    {
        // Find the destination by its ID or fail with a 404 error if not found
        $destinasiWisata = DestinasiWisata::findOrFail($id);
        $desaWisataid = $destinasiWisata->tb_desa_wisatas_id;


        // Delete the destination
        $destinasiWisata->delete();

        // Redirect back with a success message
        return redirect()->route('admin-desa.showListDestinasi', $desaWisataid)
            ->with('success', 'Destinasi Wisata berhasil dihapus.');
    }
}
