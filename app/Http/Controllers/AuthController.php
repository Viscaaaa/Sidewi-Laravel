<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\akun;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\ApiService;

class AuthController extends Controller
{

    protected $apiService;


    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function formregister()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|unique:tb_akun',
            'password' => 'required|min:6|confirmed',
        ]);

        akun::create([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return redirect('/formlogin')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function showLogin()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $response = $this->apiService->login($request->input('email'), $request->input('password'));


        if (isset($response['token'])) {
            $user = $response['data'];

            Auth::loginUsingId($user['id']);
            session(['api_token' => $response['token']]);

            return Redirect::route('profile.index')->with('success', 'Login successful!');
        }

        $errorMessage = $response['message'] ?? 'Login failed. Please try again.';
        return Redirect::back()->withErrors(['email' => $errorMessage]);
    }

    // public function login(Request $request)
    // {
    //     $user = akun::where('email', $request->email)->first();

    //     if (!$user) {
    //         return redirect('/formlogin')->withErrors(['email' => 'Email tidak terdaftar.']);
    //     }

    //     if (!Hash::check($request->password, $user->password)) {
    //         return redirect('/formlogin')->withErrors(['password' => 'Password salah.']);
    //     }

    //     Auth::login($user);


    //     if ($user->role === 'super_admin') {
    //         // Redirect ke halaman khusus Super Admin
    //         return redirect()->route('superadmin.index');
    //     }


    //     if ($user->role === 'admin') {
    //         $useradmin = $user->tb_admindesa;
    //         $id_desa = $useradmin->tb_desa_wisatas_id ?? null;

    //         if ($id_desa) {
    //             // Pastikan pengalihan ke halaman yang benar
    //             return redirect()->route('admin-desa.showListDestinasi', ['id' => $id_desa]);
    //         } else {
    //             return redirect('/formlogin')->withErrors(['error' => 'ID Desa Wisata tidak ditemukan.']);
    //         }
    //     }

    //     return redirect('/');
    // }

}
