<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ApiService;

class AdminController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }


    public function index()
    {
        $token = session('api_token');
        $this->apiService->setToken($token);


        $admins = $this->apiService->get('admins');

        return view('admin.dashboard', ['admins' => $admins]);
    }


    public function create()
    {
        return view('admin.create');
    }


    public function store(Request $request)
    {

        $token = session('api_token');
        $this->apiService->setToken($token);


        $validatedData = $request->validate([
            'tb_desa_wisatas_id' => 'required|integer',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'nama' => 'required|string|max:255',
            'no_telp' => 'nullable|string|max:20',
        ]);


        $response = $this->apiService->post('admins', $validatedData);

        if (isset($response['id'])) {
            return redirect()->route('admin.dashboard')->with('success', 'Admin created successfully!');
        }


        return redirect()->back()->withErrors(['error' => 'Failed to create admin']);
    }


    public function edit($id)
    {
        $token = session('api_token');
        $this->apiService->setToken($token);

        $response = $this->apiService->get("admins/{$id}");

        if (isset($response['id'])) {
            $admin = $response;
        } else {
            return redirect()->route('admin.dashboard')->withErrors(['error' => 'Admin not found']);
        }

        return view('admin.edit', ['admin' => $admin]);
    }


    public function update(Request $request, $id)
    {
        $token = session('api_token');
        $this->apiService->setToken($token);

        $validatedData = $request->validate([
            'tb_desa_wisatas_id' => 'required|integer',
            'email' => 'required|email',
            'password' => 'nullable|min:8',
            'password_confirmation' => 'nullable|same:password',
            'nama' => 'required|string|max:255',
            'no_telp' => 'nullable|string|max:20',
        ]);

        // Menyiapkan data untuk permintaan update
        $data = [
            'tb_desa_wisatas_id' => $validatedData['tb_desa_wisatas_id'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'] ?? null,
            'password_confirmation' => $validatedData['password_confirmation'] ?? null,
            'nama' => $validatedData['nama'],
            'no_telp' => $validatedData['no_telp'],
        ];

        $response = $this->apiService->put("admins/{$id}", $data);


        if ($response['status'] == 'sucsses') {
            return redirect()->route('admin.dashboard')->with('success', 'Admin updated successfully!');
        }

        $errorMessage = $response['message'] ?? 'Failed to update admin';
        return redirect()->back()->withErrors(['error' => $errorMessage]);
    }



    public function destroy($id)
    {
        $token = session('api_token');
        $this->apiService->setToken($token);


        $response = $this->apiService->delete("admins/{$id}");

        if ($response['status'] == 'success') {
            return redirect()->route('admin.dashboard')->with('success', 'Admin deleted successfully!');
        }


        $errorMessage = $response['message'] ?? 'Failed to delete admin';
        return redirect()->back()->withErrors(['error' => $errorMessage]);
    }
}
