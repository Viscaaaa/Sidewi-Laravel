<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DestinasiWisata;
use App\Models\DesaWisata;
use Illuminate\Support\Str;

class DestinasiWisataController extends Controller
{


    public function create($slug)
    {
        $desaWisata = DesaWisata::where('slug', 'suscipit')->firstOrFail();
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
        $slug = $desaWisata->slug;


        DestinasiWisata::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $path,
            'slug' => Str::slug($request->nama),
            'tb_desa_wisatas_id' => $desaWisata->id,
        ]);

        return redirect()->route('admin-desa.showListDestinasi', $slug)
            ->with('success', 'Destinasi wisata berhasil ditambahkan');
    }



    public function edit($id)
    {

        $destinasiWisata = DestinasiWisata::findOrFail($id);

        return view('pages.editdestinasi', compact('destinasiWisata'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'deskripsi' => 'required|string',
            'gambar' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $destinasiWisata = DestinasiWisata::findOrFail($id);



        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
            $destinasiWisata->gambar = $path;
        }

        $destinasiWisata->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'slug' => Str::slug($request->nama),

        ]);

        return redirect()->back()->with('success', 'Update successful!');
    }


    public function show($id)
    {
        $destinasiWisata = DestinasiWisata::findOrFail($id);
        return view('destinasi-wisata.show', compact('destinasiWisata'));
    }


    public function destroy($id)
    {
        $destinasiWisata = DestinasiWisata::findOrFail($id);
        $desaWisataid = $destinasiWisata->tb_desa_wisatas_id;


        $destinasiWisata->delete();


        return redirect()->back()->with('success', 'Delete successful!');
    }
}
