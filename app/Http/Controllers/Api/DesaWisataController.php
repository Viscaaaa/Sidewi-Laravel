<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DesaWisata;
use Illuminate\Support\Facades\Validator;

class DesaWisataController extends Controller
{

    public function index()
    {
        $desaWisata = DesaWisata::all();
        return response()->json($desaWisata, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gambar' => 'required|string',
            'alamat' => 'required|string',
            'nama' => 'required|string|max:25',
            'deskripsi' => 'required|string',
            'maps' => 'required|string',
            'kategori' => 'required|in:rintisan,berkembang,maju,mandiri',
            'kabupaten' => 'required|in:Badung,Bangli,Buleleng,Denpasar,Gianyar,Jembrana,Karangasem,Klungkung,Tabanan',
            'slug' => 'required|string|max:35|unique:tb_desa_wisatas'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $desaWisata = DesaWisata::create($request->all());

        return response()->json(['message' => 'Desa wisata created successfully', 'desa_wisata' => $desaWisata], 201);
    }

    public function show($id)
    {
        $desaWisata = DesaWisata::find($id);

        if (!$desaWisata) {
            return response()->json(['message' => 'Desa wisata not found'], 404);
        }

        return response()->json($desaWisata, 200);
    }

    public function update(Request $request, $id)
    {
        $desaWisata = DesaWisata::find($id);

        if (!$desaWisata) {
            return response()->json(['message' => 'Desa wisata not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'gambar' => 'nullable|string',
            'alamat' => 'nullable|string',
            'nama' => 'nullable|string|max:25',
            'deskripsi' => 'nullable|string',
            'maps' => 'nullable|string',
            'kategori' => 'nullable|in:rintisan,berkembang,maju,mandiri',
            'kabupaten' => 'nullable|in:Badung,Bangli,Buleleng,Denpasar,Gianyar,Jembrana,Karangasem,Klungkung,Tabanan',
            'slug' => 'nullable|string|max:35|unique:tb_desa_wisatas,slug,' . $id
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $desaWisata->update($request->all());

        return response()->json(['message' => 'Desa wisata updated successfully', 'desa_wisata' => $desaWisata], 200);
    }

    public function destroy($id)
    {
        $desaWisata = DesaWisata::find($id);

        if (!$desaWisata) {
            return response()->json(['message' => 'Desa wisata not found'], 404);
        }

        $desaWisata->delete();

        return response()->json(['message' => 'Desa wisata deleted successfully'], 200);
    }
}
