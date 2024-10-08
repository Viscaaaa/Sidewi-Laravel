<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class DestinasiController extends Controller
{

    // protected $apiService;

    // public function __construct(ApiService $apiService)
    // {
    //     $this->apiService = $apiService;
    // }

    // private function getAdminId()
    // {
    //     return auth()->user()->id;
    // }

    // public function index()
    // {
    //     $token = session('api_token');
    //     $adminId = $this->getAdminId();
    //     $this->apiService->setToken($token);


    //     $response = $this->apiService->getDesaWisataByAdminId($adminId);


    //     if (!empty($response) && isset($response[0])) {

    //         $desaWisata = $response[0];


    //         return view('destinasi.dashboard', [
    //             'desaWisata' => $desaWisata,
    //             'destinasi' => $desaWisata['destinasi'],
    //             'adminId' => $adminId
    //         ]);
    //     }


    //     return redirect()->back()->withErrors(['error' => 'Desa wisata tidak ditemukan untuk admin ini.']);
    // }


    // public function create($desa_id)
    // {
    //     return view('destinasi.create', ['desa_id' => $desa_id]);
    // }
    // public function store(Request $request)
    // {
    //     // Validasi input data dari form
    //     $data = $request->validate([
    //         'tb_desa_wisatas_id' => 'required|exists:tb_desa_wisatas,id',
    //         'deskripsi' => 'required|string',
    //         'nama' => 'required|string|max:50',
    //         'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     // Mendapatkan file gambar
    //     if ($request->hasFile('gambar')) {
    //         $file = $request->file('gambar');

    //         // Memeriksa apakah file valid
    //         if ($file->isValid()) {
    //             // Membuat array data untuk dikirim ke API
    //             $data['slug'] = Str::slug($data['nama']);

    //             // Menyertakan file dalam request API
    //             $multipartData = [
    //                 [
    //                     'name'     => 'tb_desa_wisatas_id',
    //                     'contents' => $data['tb_desa_wisatas_id']
    //                 ],
    //                 [
    //                     'name'     => 'deskripsi',
    //                     'contents' => $data['deskripsi']
    //                 ],
    //                 [
    //                     'name'     => 'nama',
    //                     'contents' => $data['nama']
    //                 ],
    //                 [
    //                     'name'     => 'slug',
    //                     'contents' => $data['slug']
    //                 ],
    //                 [
    //                     'name'     => 'gambar',
    //                     'contents' => fopen($file->getRealPath(), 'r'),
    //                     'filename' => $file->getClientOriginalName()
    //                 ]
    //             ];



    //             // Mengatur token API dan memanggil layanan API
    //             $token = session('api_token');
    //             $this->apiService->setToken($token);

    //             // Kirim request dengan multipart/form-data
    //             $response = $this->apiService->postDestinasiWisata('destinasi', $multipartData);

    //             // Simpan respons API ke session
    //             session()->flash('api_response', $response);

    //             // Memeriksa apakah destinasi wisata berhasil ditambahkan
    //             if (isset($response['destinasi_wisata'])) {
    //                 return redirect()->route('destinasi.index')->with('success', 'Destinasi wisata berhasil ditambahkan.');
    //             }
    //         } else {
    //             return redirect()->back()->withErrors(['gambar' => 'File gambar tidak valid.']);
    //         }
    //     } else {
    //         return redirect()->back()->withErrors(['gambar' => 'Tidak ada file yang diunggah.']);
    //     }

    //     // Jika gagal, kembalikan dengan error
    //     return redirect()->back()->withErrors(['api_error' => 'Gagal menambahkan destinasi wisata.']);
    // }



    // public function edit($id)
    // {
    //     $token = session('api_token');
    //     $this->apiService->setToken($token);
    //     $destinasi = $this->apiService->getDestinasiWisataById($id);

    //     if ($destinasi) {
    //         return view('destinasi.edit', ['destinasi' => $destinasi]);
    //     }

    //     return redirect()->route('destinasi.index')->withErrors(['error' => 'Destinasi wisata tidak ditemukan.']);
    // }

    // public function update(Request $request, $id)
    // {
    //     $data = $request->validate([
    //         'tb_desa_wisatas_id' => 'nullable|exists:tb_desa_wisatas,id',
    //         'deskripsi' => 'nullable|string',
    //         'nama' => 'nullable|string|max:50',
    //         'gambar' => 'nullable|string',
    //         'slug' => 'nullable|string|max:60|unique:tb_destinasi_wisatas,slug,' . $id
    //     ]);

    //     $token = session('api_token');
    //     $this->apiService->setToken($token);
    //     // $response = $this->apiService->updateDestinasiWisata($id, $data);

    //     if (isset($response['destinasi_wisata'])) {
    //         return redirect()->route('destinasi.index')->with('success', 'Destinasi wisata berhasil diperbarui.');
    //     }

    //     return redirect()->back()->withErrors(['error' => 'Gagal memperbarui destinasi wisata.']);
    // }

    // public function destroy($id)
    // {
    //     $token = session('api_token');
    //     $this->apiService->setToken($token);
    //     // $response = $this->apiService->deleteDestinasiWisata($id);

    //     if ($response) {
    //         return redirect()->route('destinasi.index')->with('success', 'Destinasi wisata berhasil dihapus.');
    //     }

    //     return redirect()->back()->withErrors(['error' => 'Gagal menghapus destinasi wisata.']);
    // }
}
