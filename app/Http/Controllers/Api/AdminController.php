<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\tb_admindesa;
use App\Models\akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $adminDesa = tb_admindesa::with('DesaWisata', 'akun')->get();
        return response()->json($adminDesa, 200);
    }

    public function store(Request $request)
    {

        $data = Validator::make($request->all(), [
            'tb_desa_wisatas_id' => 'required|exists:tb_desa_wisatas,id',
            'email' => 'required|email|unique:tb_akun',
            'password' => 'required|min:6|confirmed',
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
        ]);

        if ($data->fails()) {
            return response()->json($data->errors(), 400);
        }

        $akun = akun::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->password),
            'role' => 'admin'
        ]);

        tb_admindesa::create([
            'tb_desa_wisatas_id' => $request->tb_desa_wisatas_id,
            'tb_akun_id' => $akun->id
        ]);

        return response()->json(['status' => 'sucsses', 'message' => 'Create admin successfully'], 200);
    }

    public function show($id)
    {
        $adminDesa = tb_admindesa::with('DesaWisata', 'akun')->find($id);

        if (!$adminDesa) {
            return response()->json(['message' => 'Admin not found'], 404);
        }

        return response()->json($adminDesa, 200);
    }

    public function update(Request $request, $id)
    {
        $adminDesa = tb_admindesa::find($id);

        if (!$adminDesa) {
            return response()->json(['status' => 'failed', 'message' => 'Admin not found'], 404);
        }

        $data = Validator::make($request->all(), [
            'tb_desa_wisatas_id' => 'exists:tb_desa_wisatas,id',
            'email' => 'email|unique:tb_akun,email,' . $adminDesa->akun->id,
            'password' => 'nullable|min:6|confirmed',
            'nama' => 'string|max:255',
            'no_telp' => 'string|max:15',
        ]);

        if ($data->fails()) {
            return response()->json($data->errors(), 400);
        }

        $akun = $adminDesa->akun;
        $akun->nama = $request->nama ?? $akun->nama;
        $akun->email = $request->email ?? $akun->email;
        $akun->no_telp = $request->no_telp ?? $akun->no_telp;

        if ($request->password) {
            $akun->password = Hash::make($request->password);
        }

        $akun->save();

        $adminDesa->tb_desa_wisatas_id = $request->tb_desa_wisatas_id ?? $adminDesa->tb_desa_wisatas_id;
        $adminDesa->save();

        return response()->json(['status' => 'sucsses', 'message' => 'Admin updated successfully', 'akun' => $akun], 200);
    }

    public function destroy($id)
    {
        $adminDesa = tb_admindesa::find($id);

        if (!$adminDesa) {
            return response()->json(['status' => 'failed', 'message' => 'Admin not found'], 404);
        }

        $akun = $adminDesa->akun;
        $adminDesa->delete();
        $akun->delete();

        return response()->json(['status' => 'sucsses', 'message' => 'Admin deleted successfully'], 200);
    }
}
