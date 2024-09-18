<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiService;

class DestinasiController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
        $this->apiService->setToken(auth()->user()->token);
    }


    public function index()
    {

        $destinasi = $this->apiService->get('destinasi');

        return view('admin.destinasi.index', ['destinasi' => $destinasi]);
    }


    public function create()
    {
        return view('admin.destinasi.create');
    }


    public function store(Request $request)
    {
        $data = $request->only(['nama', 'deskripsi', 'gambar']);
        $data['tb_desa_wisatas_id'] = auth()->user()->desa_wisata_id;

        $response = $this->apiService->post('destinasi', $data);

        if (isset($response['success']) && $response['success']) {
            return redirect()->route('admin.destinasi.index')->with('success', 'Destinasi berhasil ditambahkan');
        }

        return back()->withErrors('Gagal menambahkan destinasi');
    }


    public function edit($id)
    {

        $destinasi = $this->apiService->get("destinasi/{$id}");

        return view('admin.destinasi.edit', compact('destinasi'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->only(['nama', 'deskripsi', 'gambar']);
        $response = $this->apiService->put("destinasi/{$id}", $data);

        if (isset($response['success']) && $response['success']) {
            return redirect()->route('admin.destinasi.index')->with('success', 'Destinasi berhasil diperbarui');
        }

        return back()->withErrors('Gagal memperbarui destinasi');
    }


    public function destroy($id)
    {

        $response = $this->apiService->delete("destinasi/{$id}");

        if (isset($response['success']) && $response['success']) {
            return redirect()->route('admin.destinasi.index')->with('success', 'Destinasi berhasil dihapus');
        }

        return back()->withErrors('Gagal menghapus destinasi');
    }
}
