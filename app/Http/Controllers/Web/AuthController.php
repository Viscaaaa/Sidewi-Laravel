<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Services\ApiService;

class AuthController extends Controller
{

    protected $apiService;


    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
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
            $this->apiService->setToken($response['token']);

            // if ($user['role'] === 'super_admin') {
            //     return redirect()->route('profile.dashboard')->with('success', 'Login successful!');
            // }

            return redirect()->route('profile.index')->with('success', 'Login successful!');
        }

        return redirect()->back()->withErrors(['email' => 'Login failed. Please try again.']);
    }
}
