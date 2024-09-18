<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_admindesa;
use Illuminate\Support\Facades\Hash;
use App\Models\DesaWisata;
use App\Models\akun;



class SuperAdminController extends Controller
{

    public function index()
    {
        $admins = tb_admindesa::with('akun', 'DesaWisata')->get();
        return view('superadmin.index', compact('admins'));
    }


    public function create()
    {
        $desa_wisata = DesaWisata::all();
        return view('superadmin.create', compact('desa_wisata'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'tb_desa_wisatas_id' => 'required|exists:tb_desa_wisatas,id',
            'email' => 'required|email|unique:tb_akun',
            'password' => 'required|min:6|confirmed',
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
        ]);


        $akun = akun::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);


        tb_admindesa::create([
            'tb_desa_wisatas_id' => $request->tb_desa_wisatas_id,
            'tb_akun_id' => $akun->id,
        ]);

        return redirect()->route('superadmin.index')->with('success', 'Admin desa berhasil ditambahkan dan ditugaskan.');
    }


    public function edit($id)
    {
        $admin = tb_admindesa::with('akun', 'DesaWisata')->findOrFail($id);
        $desa_wisata = DesaWisata::all();
        return view('superadmin.edit', compact('admin', 'desa_wisata'));
    }


    public function update(Request $request, $id)
    {
        $admin = tb_admindesa::findOrFail($id);
        $akun = $admin->akun;


        $request->validate([
            'tb_desa_wisatas_id' => 'required|exists:tb_desa_wisatas,id',
            'email' => 'required|email|unique:tb_akun,email,' . $akun->id,
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'password' => 'nullable|min:6|confirmed',
        ]);


        $akun->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'password' => $request->password ? Hash::make($request->password) : $akun->password,
        ]);


        $admin->update([
            'tb_desa_wisatas_id' => $request->tb_desa_wisatas_id,
        ]);

        return redirect()->route('superadmin.index')->with('success', 'Admin desa berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $admin = tb_admindesa::findOrFail($id);
        $akun = $admin->akun;


        $admin->delete();
        $akun->delete();

        return redirect()->route('superadmin.index')->with('success', 'Admin desa berhasil dihapus.');
    }
}
