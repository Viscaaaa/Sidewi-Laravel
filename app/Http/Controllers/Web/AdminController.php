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


        $this->apiService->post('admins', $validatedData);


        return redirect()->back()->with(['success' => 'Create admin successfull',]);
    }


    public function edit($id)
    {
        $token = session('api_token');
        $this->apiService->setToken($token);

        $response = $this->apiService->get("admins/{$id}");

        if (is_null($response)) {
            return redirect()->route('admin.dashboard')->withErrors(['error' => 'Admin not found']);
        } else {
            $admin = $response;
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


        $data = [
            'tb_desa_wisatas_id' => $validatedData['tb_desa_wisatas_id'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'] ?? null,
            'password_confirmation' => $validatedData['password_confirmation'] ?? null,
            'nama' => $validatedData['nama'],
            'no_telp' => $validatedData['no_telp'],
        ];

        $this->apiService->put("admins/{$id}", $data);


        return redirect()->back()->with('success', 'Admin updated successfully!');
    }



    public function destroy($id)
    {
        $token = session('api_token');
        $this->apiService->setToken($token);


        $this->apiService->delete("admins/{$id}");


        return redirect()->back();
    }
}
