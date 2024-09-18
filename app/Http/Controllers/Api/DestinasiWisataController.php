<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DestinasiWisata;
use Illuminate\Support\Facades\Validator;

class DestinasiWisataController extends Controller
{

    public function index()
    {
        $destinasiWisata = DestinasiWisata::with('desaWisata')->get();
        return response()->json($destinasiWisata, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tb_desa_wisatas_id' => 'required|exists:tb_desa_wisatas,id',
            'deskripsi' => 'required|string',
            'nama' => 'required|string|max:50',
            'gambar' => 'required|string',
            'slug' => 'required|string|max:60|unique:tb_destinasi_wisatas'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $destinasiWisata = DestinasiWisata::create($request->all());

        return response()->json(['message' => 'Destinasi wisata created successfully', 'destinasi_wisata' => $destinasiWisata], 201);
    }

    public function show($id)
    {
        $destinasiWisata = DestinasiWisata::with('desaWisata')->find($id);

        if (!$destinasiWisata) {
            return response()->json(['message' => 'Destinasi wisata not found'], 404);
        }

        return response()->json($destinasiWisata, 200);
    }

    public function update(Request $request, $id)
    {
        $destinasiWisata = DestinasiWisata::find($id);

        if (!$destinasiWisata) {
            return response()->json(['message' => 'Destinasi wisata not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'tb_desa_wisatas_id' => 'nullable|exists:tb_desa_wisatas,id',
            'deskripsi' => 'nullable|string',
            'nama' => 'nullable|string|max:50',
            'gambar' => 'nullable|string',
            'slug' => 'nullable|string|max:60|unique:tb_destinasi_wisatas,slug,' . $id
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $destinasiWisata->update($request->all());

        return response()->json(['message' => 'Destinasi wisata updated successfully', 'destinasi_wisata' => $destinasiWisata], 200);
    }

    public function destroy($id)
    {
        $destinasiWisata = DestinasiWisata::find($id);

        if (!$destinasiWisata) {
            return response()->json(['message' => 'Destinasi wisata not found'], 404);
        }

        $destinasiWisata->delete();

        return response()->json(['message' => 'Destinasi wisata deleted successfully'], 200);
    }
}
